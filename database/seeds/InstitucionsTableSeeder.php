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
            'tipo_institucion_id'=>'1'
        ]);
    }
}
