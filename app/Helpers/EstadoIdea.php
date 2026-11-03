<?php

namespace App\Helpers;

class EstadoIdea{
    public static function opciones():array{

        return ['registrada' => 'Registrada',
                'en revisión' => 'En revisión',
                'aprobada' => 'Aprobada',
                'rechazada' => 'Rechazada'];
    }
}