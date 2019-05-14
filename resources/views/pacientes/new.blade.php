@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo paciente
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Formulario de creacion de paciente -->
                    <form action="{{ url('paciente')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="paciente-nombre" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" name="nombre" id="paciente-nombre" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-apellido" class="col-sm-3 control-label">Apellido</label>
                            <div class="col-sm-6">
                                <input type="text" name="apellido" id="paciente-apellido" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-fecha-nac" class="col-sm-3 control-label">Fecha de nacimiento</label>
                            <div class="col-sm-6">
                                <input type="date" name="fecha_nac" id="paciente-fecha-nac" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-lugar-nac" class="col-sm-3 control-label">Lugar de nacimiento</label>
                            <div class="col-sm-6">
                                <input type="text" name="lugar_nac" id="paciente-lugar-nac" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-partido" class="col-sm-3 control-label">Partido</label>
                            <div class="col-sm-6">
                                <select name="partido" id="paciente-partido" class="form-control" required>
                                    <!-- Se deberian cargar con AJAX -->
                                    <option value=1>La Plata</option>
                                    <option value=2>Chivilcoy</option>
                                    <option value=3>GBA</option>
                                    <option value=4>CABA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-region-sanitaria" class="col-sm-3 control-label">Region sanitaria</label>
                            <div class="col-sm-6">
                                <input name="region_sanitaria" id="paciente-region-sanitaria" class="form-control" required readonly>
                                <!-- Cargar con AJAX y deberia ser solo lectura en funcion del partido -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-localidad" class="col-sm-3 control-label">Localidad</label>
                            <div class="col-sm-6">
                                <select name="localidad" id="paciente-localidad" class="form-control" required>
                                    <!-- Cargar con AJAX en funcion de partido -->
                                    <option value=1>La Plata</option>
                                    <option value=2>Tolosa</option>
                                    <option value=1>Chivilcoy</option>
                                    <option value=1>Belgrano</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-domicilio" class="col-sm-3 control-label">Domicilio</label>
                            <div class="col-sm-6">
                                <input type="text" name="domicilio" id="paciente-domicilio" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-genero" class="col-sm-3 control-label">Genero</label>
                            <div class="col-sm-6">
                                <select name="genero" id="paciente-genero" class="form-control" required>
                                    <option value=1>Masculino</option>
                                    <option value=2>Femenino</option>
                                    <option value=3>Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-tiene-documento" class="col-sm-3 control-label">Posee documento</label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="tiene_documento" id="paciente-tiene-documento" class="form-check-input" value="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-tipo-documento" class="col-sm-3 control-label">Tipo documento</label>
                            <div class="col-sm-6">
                                <select name="tipo_documento" id="paciente-tipo-documento" class="form-control" required>
                                    <option value=1>DNI</option>
                                    <option value=2>LC</option>
                                    <option value=3>LI</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-documento" class="col-sm-3 control-label">Documento</label>
                            <div class="col-sm-6">
                                <input type="text" name="documento" id="paciente-documento" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-nro-historia-clinica" class="col-sm-3 control-label">Historia clinica</label>
                            <div class="col-sm-6">
                                <input type="text" name="nro_historia_clinica" id="paciente-nro-historia-clinica" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-nro-carpeta" class="col-sm-3 control-label">Numero de carpeta</label>
                            <div class="col-sm-6">
                                <input type="text" name="nro_carpeta" id="paciente-nro-carpeta" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-telefono" class="col-sm-3 control-label">Telefono</label>
                            <div class="col-sm-6">
                                <input type="text" name="telefono" id="paciente-telefono" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paciente-obra-social" class="col-sm-3 control-label">Obra social</label>
                            <div class="col-sm-6">
                                <select name="obra_social" id="paciente-obra-social" class="form-control" required>
                                    <!-- Se deberian cargar con AJAX -->
                                    <option value=1>IOMA</option>
                                    <option value=2>OSDE</option>
                                    <option value=3>OSECAC</option>
                                </select>
                            </div>
                        </div>
                        <!-- Guardar -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection