<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Homero S. Salso',
            'email' => 'admin@gmail.com',
            'rol' => 'Administrador',
            'password' => Hash::make('admin123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pedro Lorenzo',
            'email' => 'cliente@gmail.com',
            'rol' => 'Cliente',
            'password' => Hash::make('cliente123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alberto Mesas',
            'email' => 'socio@gmail.com',
            'rol' => 'Socio',
            'password' => Hash::make('socio123'),
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'users'
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'tareas'
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'inventarios'
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'formulas'
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'categorias'
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'casos'
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'seguimientos'
        ]);
        DB::table('contadors')->insert([
            'nombre' => 'eventos'
        ]);
    }
}
