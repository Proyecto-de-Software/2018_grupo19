<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localidads')->insert([
            'nombre'=>'La Plata',
            'partido_id'=>'1'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Tolosa',
            'partido_id'=>'1'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Chivilcoy',
            'partido_id'=>'2'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'La Matanza',
            'partido_id'=>'3'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Belgrano',
            'partido_id'=>'4'
        ]);
        DB::table('localidads')->insert([
            'nombre'=>'Nunez',
            'partido_id'=>'4'
        ]);
    }
}
