<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nombre');
            $table->string('director');
            $table->string('telefono');
            $table->string('longitud');
            $table->string('latitud');

            //Claves foraneas
            $table->integer('region_sanitaria_id')->unsigned();
            $table->foreign('region_sanitaria_id')->references('id')->on('region_sanitarias');
            $table->integer('tipo_institucion_id')->unsigned();
            $table->foreign('tipo_institucion_id')->references('id')->on('tipo_institucions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institucions');
    }
}
