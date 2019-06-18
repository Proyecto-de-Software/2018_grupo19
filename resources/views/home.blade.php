@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <h1 class="display-4">Bienvenido al Hospital Alejandro Korn</h1>
                <p class="lead">{{ ConfigPage::getValue('descripcion') }}</p>
                <hr class="my-4">
                <p>Contactanos en la dirección {{ ConfigPage::getValue('mail') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
