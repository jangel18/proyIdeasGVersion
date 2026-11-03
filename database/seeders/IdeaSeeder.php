<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Idea;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Idea::create([
            'titulo' => 'Aplicación para organizar citas
            veterinarias',
            'descripcion' => 'Sistema para registrar y organizar
            citas de mascotas.',
            'estado' => 'registrada',
            'autor' => 'Jose',
            'categoriaId' => 1
            ]);
        Idea::create([
            'titulo' => 'Plataforma para cursos en línea',
            'descripcion' => 'Sistema para ofrecer cursos y
            materiales educativos.',
            'estado' => 'en revisión',
            'autor' => 'Pedro',
            'categoriaId' => 2
            ]);
        Idea::create([
            'titulo' => 'Todo o nada',
            'descripcion' => 'Invertir todo en un negocio de bitcoin',
            'estado' => 'en revisión',
            'autor' => 'Santi',
            'categoriaId' => 5
            ]);
    }
}
