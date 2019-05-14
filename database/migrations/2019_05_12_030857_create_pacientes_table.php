<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('apellido');
            $table->string('nombre');
            $table->string('lugar_nac');
            $table->date('fecha_nac');
            $table->string('domicilio');
            $table->boolean('tiene_documento');
            $table->string('documento');
            $table->string('telefono');
            $table->string('nro_historia_clinica');
            $table->string('nro_carpeta');

            //Claves foraneas
            $table->integer('localidad_id')->unsigned();
            $table->foreign('localidad_id')->references('id')->on('localidads');
            $table->integer('region_sanitaria_id')->unsigned();
            $table->foreign('region_sanitaria_id')->references('id')->on('region_sanitarias');
            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->integer('tipo_doc_id')->unsigned();
            $table->foreign('tipo_doc_id')->references('id')->on('tipo_documentos');
            $table->integer('obra_social_id')->unsigned();
            $table->foreign('obra_social_id')->references('id')->on('obra_socials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
