<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $usuarios = [
        [
          'name' => 'Admin',
          'email' => 'admin@ideas',
          'rol' => 'admin',
        ],
        [
          'name' => 'Coordinador',
          'email' => 'coordinador@ideas',
          'rol' => 'coordinador',
        ],
        [
          'name' => 'Asistente',
          'email' => 'asistente@ideas',
          'rol' => 'asistente',
        ],
      ];
  
  
      foreach ($usuarios as $usuario) {
        User::updateOrCreate(
          ['email' => $usuario['email']],
          [
            'name' => $usuario['name'],
            'password' => bcrypt('12345'),
            'rol' => $usuario['rol'],
          ]
        );
      }
    }
}
