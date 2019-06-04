@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @yield('title')
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <form action="@yield('action')" method="POST" class="form-horizontal" id="form">
                        {{ csrf_field() }}
                        @yield('form-fields')
                        <!-- Guardar -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Boton cancelar -->
                    <form action="@yield('cancel-action')">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>Descartar 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection