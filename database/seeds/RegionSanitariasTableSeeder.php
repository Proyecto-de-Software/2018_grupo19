<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSanitariasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('region_sanitarias')->insert([
            'nombre'=>'I'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'II'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'III'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'IV'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'V'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'VI'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'VII'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'VIII'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'IX'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'X'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'XI'
        ]);
        DB::table('region_sanitarias')->insert([
            'nombre'=>'XII'
        ]);
    }
}
