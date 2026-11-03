<?php

namespace App\Filament\Widgets;
use Filament\Widgets\ChartWidget;
use App\Models\Idea;

class IdeasGraficaCardsStatsOverview extends ChartWidget
{
    protected static ?string $heading = 'Estados';

    protected function getData(): array
    {
        $registradas = Idea::where('estado', 'registrada')->count();
        $aprobadas = Idea::where('estado', 'aprobada')->count();
        $enRevision = Idea::where('estado', 'en revision')->count();
        $rechazadas = Idea::where('estado', 'rechazada')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Estados',
                    'data' => [$registradas, $aprobadas, $enRevision, $rechazadas],
                    'backgroundColor' => [
                        '#718696',    // Registradas
                        'green',   // Aprobadas
                        'orange',  // En revisión
                        'red',
                    ],
                    'borderColor' => '#ffffff', // Borde blanco para delimitar rebanadas
                    'borderWidth' => 2,
                
                ],
            ],
            'labels' => ['registradas', 'aprobadas', 'en revision', 'rechazadas'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
