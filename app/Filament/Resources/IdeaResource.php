<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use App\Filament\Resources\IdeaResource\Pages;
use App\Filament\Resources\IdeaResource\RelationManagers;
use App\Models\Idea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Helpers\EstadoIdea;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section;
use Filament\Tables\Actions\Action;
use Filament\Forms\Get;
use Filament\Forms\Set;
class IdeaResource extends Resource
{
    protected static ?string $model = Idea::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->label('Título de la idea')
                    ->helperText('Escribe un titulo que sea ilustrativo')
                    ->placeHolder('Aplicación de comida')
                    ->unique()
                    ->required()
                    ->validationMessages([
                        'unique'=> 'Ya tienes una idea con el mismo nombre',
                    ]),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Describe tu idea')
                    ->helperText('Describe a detalle en que consiste la idea del proyecto')
                    ->placeHolder('Aplicación de comida que permite tener un menú y comprar desde la misma app')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('autor')
                    ->required(),    
                Forms\Components\Select::make('categoriaId')
                    ->relationship('categoria', 'nombre')
                    ->label('Categoría')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('estado')
                    ->required()
                    ->hiddenOn('create')
                    ->options(EstadoIdea::opciones())
                    ->default('registrada')
                    ->live() // Hace que el formulario reaccione al cambio, como un observer
                    ->afterStateUpdated(function (string $state, Set $set) {
                        if ($state === 'aprobada' || $state === 'en revision') {
                            $set('observacion', null);
                        }
                    }),
                Forms\Components\Textarea::make('observacion')
                        ->label('Observación')
                        ->placeholder('Escribe la razón del rechazo...')
                        ->required()
                        ->visible(fn (Get $get) => 
                            $get('estado') === 'rechazada')
                        ->maxLength(200)
                        ,
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                ->columns(1) 
                ->inlineLabel() 
                ->schema([
                    TextEntry::make('titulo')
                        ->label('Título de la idea'),

                    TextEntry::make('descripcion')
                        ->label('Descripción'),

                    TextEntry::make('observacion')
                        ->label('Observacion')
                        ->visible(fn(Idea $record) => $record->estado == 'rechazada'),

                    TextEntry::make('autor')
                        ->label('Autor'),

                    TextEntry::make('estado')
                        ->label('Estado')
                        ->badge(),

                    TextEntry::make('categoria.nombre')
                        ->label('Categoría'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('#')    
                    ->searchable(),
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->wrap()
                    //->toggleable(isToggledHiddenByDefault: true)
                    ,
                Tables\Columns\TextColumn::make('estado')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('autor')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordUrl(null)
            ->recordAction(Tables\Actions\ViewAction::class) //te manda a view cuando le das a cualquier parte 
            ->filters([
                Tables\Filters\SelectFilter::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->label('Categoría'),
                Tables\Filters\SelectFilter::make('estado')
                    ->label('Estado')
                    ->options(EstadoIdea::opciones())
                    ->multiple()
                    ->default(collect(EstadoIdea::opciones())->except('rechazada')->keys()->all()), //saca todas las opciones excepto rechazada 
                Tables\Filters\TrashedFilter::make()
                    ,
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(""),
                Tables\Actions\ViewAction::make()->extraAttributes(['class' => 'hidden']), // lo quita a nivel visual pero no a nivel operativo
                Tables\Actions\DeleteAction::make()->label(""),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\Action::make('aprobar')->label('Aprobar')->icon('heroicon-m-hand-thumb-up')->color('success')->requiresConfirmation()->modalheading('Deseas aprobar la idea ?')
                ->modalDescription('Seguro?')
                ->action(function(Idea $record){
                    $record->update(['estado' => 'aprobada','observacion' => NULL,]
                    );
                    Notification::make()
                        ->title('Idea aprobada correctamente')
                        ->success()
                        ->send();
                })
                ->visible(fn(Idea $record) => $record->estado !== 'aprobada'),

                Tables\Actions\Action::make('rechazar')->label('Rechazar')->icon('heroicon-m-hand-thumb-down')->color('danger')->requiresConfirmation()->modalheading('Deseas rechazar la idea ?')
                ->modalDescription('Ingresa el motivo por el que rechazas la idea')
                    ->form([
                        Forms\Components\Textarea::make('observacion')
                            ->label('Observación')
                            ->placeholder('Escribe la razón del rechazo...')
                            ->required()
                            ,
                    ])
                ->action(function (Idea $record, array $data): void {
                    $record->update([
                        'estado' => 'rechazada',
                        'observacion' => $data['observacion'],
                    ]);

                    Notification::make()
                        ->title('Idea rechazada correctamente')
                        ->success()
                        ->send();
                })
                ->visible(fn(Idea $record) => $record->estado !== 'rechazada')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIdeas::route('/'),
            'create' => Pages\CreateIdea::route('/create'),
            'edit' => Pages\EditIdea::route('/{record}/edit'),
        ];
    }
}
