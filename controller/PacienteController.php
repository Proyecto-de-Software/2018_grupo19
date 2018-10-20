<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'BusquedaPacientes.php';
require_once 'RooterController.php';

class PacienteController extends Controller{

    public function redireccionarBusquedaPacientes(){
        $view = new BusquedaPacientes();
        $view->show($pacientes);
    }

}