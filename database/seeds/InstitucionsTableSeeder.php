<?php

use Illuminate\Database\Seeder;

class InstitucionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institucions')->insert([
            'nombre'=>'Hospital Alejandro Korn',
            'director'=>'Armando De Giusti',
            'telefono'=>'2214202200',
            'region_sanitaria_id'=>'1',
            'tipo_institucion_id'=>'1',
            'latitud' => -34.92590,
            'longitud' => -57.97120
        ]);

        DB::table('institucions')->insert([
            'nombre'=>'Institución Que No Se Mancha',
            'director'=>'Diego Armando Maradona',
            'telefono'=>'2214202202',
            'region_sanitaria_id'=>'1',
            'tipo_institucion_id'=>'2',
            'latitud' => -34.91524,
            'longitud' => -57.97010
        ]);

        DB::table('institucions')->insert([
            'nombre'=>'Electronic Hospital',
            'director'=>'Lucio Consolo',
            'telefono'=>'2214202204',
            'region_sanitaria_id'=>'2',
            'tipo_institucion_id'=>'1',
            'latitud' => -34.91376,
            'longitud' => -57.95604
        ]);

        DB::table('institucions')->insert([
            'nombre'=>'Hospital UJCF',
            'director'=>'Ulises Jeremias Cornejo Fandos',
            'telefono'=>'2214202205',
            'region_sanitaria_id'=>'3',
            'tipo_institucion_id'=>'1',
            'latitud' => -34.92696,
            'longitud' => -57.94686
        ]);
    }
}
