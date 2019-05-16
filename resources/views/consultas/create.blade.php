@extends('layouts.form')

@section('title')
    Nueva Consulta
@endsection

@section('action')
    {{ url('consultas')}}
@endsection

@section('form-fields')
    <div class="form-group">
        <label for="consulta-fecha" class="col-sm-3 control-label">Fecha</label>
        <div class="col-sm-6">
            <input type="date" name="fecha" id="consulta-fecha" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-articulacion-con-instituciones" class="col-sm-3 control-label">Articulacion con instituciones</label>
        <div class="col-sm-6">
            <input type="text" name="articulacion_con_instituciones" id="consulta-articulacion-con-instituciones" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-internacion" class="col-sm-3 control-label">Internacion</label>
        <div class="col-sm-6">
            <input type="checkbox" name="internacion" id="consulta-internacion" class="form-check-input" value="1">
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-diagnostico" class="col-sm-3 control-label">Diagnostico</label>
        <div class="col-sm-6">
            <input type="text" name="diagnostico" id="consulta-diagnostico" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-observaciones" class="col-sm-3 control-label">Observaciones</label>
        <div class="col-sm-6">
            <input type="text" name="observaciones" id="consulta-observaciones" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-paciente-id" class="col-sm-3 control-label">Paciente</label>
        <div class="col-sm-6">
            <input type="text" name="paciente_id" id="consulta-paciente-id" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-motivo" class="col-sm-3 control-label">Motivo</label>
        <div class="col-sm-6">
            <select name="motivo_consulta_id" id="consulta-motivo" class="form-control" required>
                <!-- Se deberian cargar con AJAX -->
                <option value=1>Receta medica</option>
                <option value=2>Control</option>
                <option value=3>Consulta</option>
                <option value=4>Suicidio</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-derivacion" class="col-sm-3 control-label">Derivacion</label>
        <div class="col-sm-6">
            <select name="derivacion_id" id="consulta-derivacion" class="form-control" required>
                <!-- Mirar que onda las instituciones -->
                <option value=1>Aca iba una institucion?</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-tratamiento-farmacologico" class="col-sm-3 control-label">Tratamiento</label>
        <div class="col-sm-6">
            <select name="tratamiento_farmacologico_id" id="consulta-tratamiento-farmacologico" class="form-control" required>
                <!-- Se deberian cargar con AJAX -->
                <option value=1>Manana</option>
                <option value=2>Tarde</option>
                <option value=3>Noche</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="consulta-acompanamiento" class="col-sm-3 control-label">Acompanamiento</label>
        <div class="col-sm-6">
            <select name="acompanamiento_id" id="consulta-acompanamiento" class="form-control" required>
                <!-- Se deberian cargar con AJAX -->
                <option value=1>Familiar</option>
                <option value=2>Hermanos</option>
                <option value=3>Pareja</option>
            </select>
        </div>
    </div>
@endsection
