<?php

use Illuminate\Database\Seeder;

class ConsultaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Consulta::class)->times(50)->create();
    }
}
