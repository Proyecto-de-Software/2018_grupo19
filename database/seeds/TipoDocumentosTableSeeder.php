<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert([
            'nombre'=>'DNI'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombre'=>'LC'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombre'=>'CI'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombre'=>'LE'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombre'=>'Pasaporte'
        ]);
    }
}
