<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Idea;
use App\Models\Categoria;

class IdeasCardsStatsOverview extends BaseWidget
{

    protected function getStats(): array
    {
        $registradas = Idea::where('estado', 'registrada')->count();
        $aprobadas = Idea::where('estado', 'aprobada')->count();
        $enRevision = Idea::where('estado', 'en revision')->count();
        $rechazadas = Idea::where('estado', 'rechazada')->count();

        $categorias = Categoria::withCount('ideas')->get();

        $detalleCategorias = '';
        
        foreach( $categorias as $categoria) {

            $detalleCategorias .=  $categoria->nombre . ' : '  . $categoria->ideas_count . ' | ';
        }

        return [
            Stat::make('Total de ideas', Idea::count())->icon('heroicon-o-light-bulb')
            ->description("Aprobadas : $aprobadas |" . "Registradas : $registradas |" .
            "En revision : $enRevision |" . "Rechazadas : $rechazadas |"),
            Stat::make('Total de categorias', Categoria::count())->icon('heroicon-o-tag')
            ->description('Total de categorias__' . $detalleCategorias),
        ];
    }

    protected function getColumns(): int{
        return 1;
    }
}
