<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

require_once 'RooterController.php';

class PacienteController extends Controller{

    public function redireccionarBusquedaPacientes(){

        $pacientes = array (
            array('id' => 1, 'nombre'=>'blas'),
            array('id' => 2, 'nombre'=>'fede'),
            array('id' => 3, 'nombre'=>'pedro')
        );

        $view = new BusquedaPacientes();
        $view->show($pacientes);
    }

    public function redireccionarCreacionPacientes(){

        $view = new CreacionPaciente();
        $view->show();
    }

}