<?php

namespace App\Filament\Resources\CategoriaResource\Pages;

use App\Filament\Resources\CategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoria extends EditRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // para que te devuelva al editar
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Categoría modificada exitosamente';
    }
    

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->disabled(fn($record)=> $record->ideas()->withTrashed()->exists())
                ->label(fn($record) => $record->ideas()->withTrashed()->exists() ? ':(' : 'Eliminar categoría'),
        ];
    }
}
