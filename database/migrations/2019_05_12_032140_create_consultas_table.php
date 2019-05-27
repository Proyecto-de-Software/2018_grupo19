<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->date('fecha');
            $table->string('articulacion_con_instituciones')->nullable();
            $table->boolean('internacion');
            $table->string('diagnostico');
            $table->string('observaciones')->nullable();

            //Claves foraneas
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->integer('motivo_consulta_id')->unsigned();
            $table->foreign('motivo_consulta_id')->references('id')->on('motivo_consultas');
            $table->integer('derivacion_id')->unsigned()->nullable();
            $table->foreign('derivacion_id')->references('id')->on('institucions');
            $table->integer('tratamiento_farmacologico_id')->unsigned()->nullable();
            $table->foreign('tratamiento_farmacologico_id')->references('id')->on('tratamiento_farmacologicos');
            $table->integer('acompanamiento_id')->unsigned()->nullable();
            $table->foreign('acompanamiento_id')->references('id')->on('acompanamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
