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
            $table->string('lugar_nac')->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('domicilio')->nullable();
            $table->boolean('tiene_documento')->nullable();
            $table->string('documento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('nro_historia_clinica')->unique()->nullable();
            $table->string('nro_carpeta')->unique()->nullable();

            $table->boolean('nn')->default(false);

            //Claves foraneas
            $table->integer('localidad_id')->unsigned()->default('1');
            $table->foreign('localidad_id')->references('id')->on('localidads');
            $table->integer('region_sanitaria_id')->unsigned()->default('1');
            $table->foreign('region_sanitaria_id')->references('id')->on('region_sanitarias');
            $table->integer('genero_id')->unsigned()->default('1');
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->integer('tipo_doc_id')->unsigned()->default('1');
            $table->foreign('tipo_doc_id')->references('id')->on('tipo_documentos');
            $table->integer('obra_social_id')->unsigned()->default('1');
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
