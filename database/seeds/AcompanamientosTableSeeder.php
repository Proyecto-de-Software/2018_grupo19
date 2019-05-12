<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcompanamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acompanamientos')->insert([
            'nombre'=>'Familiar Cercano'
        ]);
        DB::table('acompanamientos')->insert([
            'nombre'=>'Hermanos e hijos'
        ]);
        DB::table('acompanamientos')->insert([
            'nombre'=>'Pareja'
        ]);
        DB::table('acompanamientos')->insert([
            'nombre'=>'Referentes vinculares'
        ]);
        DB::table('acompanamientos')->insert([
            'nombre'=>'Policía'
        ]);
        DB::table('acompanamientos')->insert([
            'nombre'=>'SAME'
        ]);
        DB::table('acompanamientos')->insert([
            'nombre'=>'Por sus propios medios'
        ]);
    }
}
