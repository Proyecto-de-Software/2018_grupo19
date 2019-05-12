<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'variable'=>'titulo',
            'valor'=>'Hospital Korn'
        ]);
        DB::table('configs')->insert([
            'variable'=>'mail',
            'valor'=>'hospitalkorn@gmail.com'
        ]);
        DB::table('configs')->insert([
            'variable'=>'descripcion',
            'valor'=>'Esto es un hospital'
        ]);
        DB::table('configs')->insert([
            'variable'=>'cantidad_por_pag',
            'valor'=>'10'
        ]);
        DB::table('configs')->insert([
            'variable'=>'estado_del_sitio',
            'valor'=>'1'
        ]);
    }
}
