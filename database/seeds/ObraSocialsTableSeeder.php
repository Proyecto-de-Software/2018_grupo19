<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObraSocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obra_socials')->insert([
            'nombre'=>'OSDE'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Sancor Salud'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Medicus'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Medife'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Galeno'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Accord Salud'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OMINT'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Swiss Medical'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'AcaSalud'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Bristol Medicine'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSECAC'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Union Personal'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSPACP'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSDEPYM'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'Luis Pasteur'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSMEDICA'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'IOMA'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSPJN'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSSSB'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSPEPBA'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSPE'
        ]);
    }
}
