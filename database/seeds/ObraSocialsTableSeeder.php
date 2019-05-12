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
            'nombre'=>'IOMA'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSDE'
        ]);
        DB::table('obra_socials')->insert([
            'nombre'=>'OSECAC'
        ]);
    }
}
