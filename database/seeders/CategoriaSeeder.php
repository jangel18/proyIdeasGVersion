<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Categoria::create([
            'nombre' => 'Tecnología',
            'descripcion' => 'Ideas relacionadas con tecnología y
            software.'
            ]);
        Categoria::create([
            'nombre' => 'Educación',
            'descripcion' => 'Ideas relacionadas con educación y
            aprendizaje.'
            ]);
        Categoria::create([
            'nombre' => 'Salud',
            'descripcion' => 'Ideas relacionadas con salud y
            bienestar.'
            ]);
        Categoria::create([
            'nombre' => 'Medio ambiente',
            'descripcion' => 'Ideas relacionadas con el cuidado
            del medio ambiente.'
            ]);
        Categoria::create([
            'nombre' => 'Idea loca',
            'descripcion' => 'Ideas de mucho riesgo y mucha recompensa'
            ]);
    }
}
