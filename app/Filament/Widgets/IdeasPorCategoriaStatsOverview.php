<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Categoria;

class IdeasPorCategoriaStatsOverview extends ChartWidget
{
    protected static ?string $heading = 'Ideas por categoría';

    protected function getData(): array
    {
        $categorias = Categoria::withCount('ideas')->orderBy('id')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Ideas',
                    'data' => $categorias->pluck('ideas_count')->all(),
                    'backgroundColor' => [
                        '#3b82f6',
                        '#0ea5e9',
                        '#10b981',
                        '#14b8a6',
                        '#f59e0b',
                        '#f97316',
                        '#ef4444',
                        '#8b5cf6',
                        '#ec4899',
                        '#64748b',
                    ],
                    'borderColor' => '#ffffff',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $categorias->pluck('nombre')->all(),
        ];
    }


    protected function getType(): string
    {
        return 'doughnut';
    }
}
