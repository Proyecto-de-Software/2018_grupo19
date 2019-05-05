<!-- Login -->

@extends('layout')

@section('title', 'Login')

@section('content')
<form>
    <div class="form-group">
      <label for="inputUser">Nombre de usuario</label>
      <input type="email" class="form-control" id="inputUser" placeholder="Ingrese su usuario">
    </div>
    <div class="form-group">
      <label for="inputPassword">Password</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="Contrasena">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection