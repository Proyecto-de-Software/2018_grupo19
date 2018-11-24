<?php

    require_once 'model/ConsultaRepository.php';
    require_once 'model/PacientesRepository.php';
    require_once 'controller/RooterController.php';
    require_once 'views/CreacionConsulta.php';

    class ConsultaController extends Controller{

        public function insertarConsulta(){
            try {
                $id = PacientesRepository::singleton()->pacienteCOnHistoria($_POST['paciente'])['id'];
                ConsultaRepository::singleton()->crearConsulta($id,$_POST['fecha'],$_POST['motivo'],$_POST['derivacion'],$_POST['articulacion'],isset($_POST['internacion']),$_POST['diagnostico'],$_POST['observaciones'],$_POST['tratamiento'],$_POST['acompanamiento']);
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

        public function redireccionarCreacionConsulta(){
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_show', $_SESSION["id"])) {
                    $view = new CreacionConsulta();
                    if (isset($_POST['nro_historia_clinica'])) {
                        $view->show($this->parametrosDeSesion(array('usuario_cargado' => $_POST['nro_historia_clinica'])));                
                    } else {
                        $view->show($this->parametrosDeSesion());
                    }
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de pacientes');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

    }
?>