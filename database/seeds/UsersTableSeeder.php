<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'root',
            'password'=>bcrypt('123456'),
            'email'=>'root@hak.com',
            'nombre'=>'root',
            'apellido'=>'user',
            'activo'=>true
        ])->assignRole('Administrador');

        User::create([
            'name' => 'equipoGuardia',
            'email' => 'equipoguardia@hak.com',
            'password' => bcrypt('123456'),
            'nombre' => 'equipo',
            'apellido' => 'guardia',
            'activo' => true
        ])->assignRole('Equipo de Guardia');

        User::create([
            'name' => 'atencion',
            'email' => 'atencion@hak.com',
            'password' => bcrypt('123456'),
            'nombre' => 'atencion',
            'apellido' => 'atencion',
            'activo' => true
        ])->assignRole('Personal de Atencion');
    }
}
