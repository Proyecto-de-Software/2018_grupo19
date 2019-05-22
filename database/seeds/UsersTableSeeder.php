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
            'email'=>'root@hak.com',
            'password'=>bcrypt('123456')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'equipoGuardia',
            'email' => 'equipoguardia@hak.com',
            'password' => bcrypt('123456'),
        ])->assignRole('Equipo de Guardia');

        User::create([
            'name' => 'atencion',
            'email' => 'atencion@hak.com',
            'password' => bcrypt('123456'),
        ])->assignRole('Personal de Atencion');
    }
}
