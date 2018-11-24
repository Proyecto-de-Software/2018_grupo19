<?php

    require_once 'model/ConsultaRepository.php';
    require_once 'model/PacientesRepository.php';
    require_once 'controller/RooterController.php';
    require_once 'views/CreacionConsulta.php';

    class ConsultaController extends Controller{

        public function insertarConsulta(){
            try { 
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_new', $_SESSION["id"])){
                    if(isset($_POST["paciente"]) && isset($_POST['fecha']) && isset($_POST["motivo"]) && isset($_POST["derivacion"]) && isset($_POST["articulacion"]) && isset($_POST['internacion']) && isset($_POST['diagnostico']) && isset($_POST['observaciones']) && isset($_POST['tratamiento']) && isset($_POST['acompanamiento'])) {
                        $id = PacientesRepository::singleton()->pacienteCOnHistoria($_POST['paciente'])['id'];
                        ConsultaRepository::singleton()->crearConsulta($id,$_POST['fecha'],$_POST['motivo'],$_POST['derivacion'],$_POST['articulacion'],isset($_POST['internacion']),$_POST['diagnostico'],$_POST['observaciones'],$_POST['tratamiento'],$_POST['acompanamiento']);
                    } else {
                        $this->redireccionarError('Error en los campos', 'Alguno de los campos obligatorios esta vacio'); 
                    }
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de pacientes');
                }
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

        public function redireccionarListadoConsultas(){
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_show', $_SESSION["id"])) {
                    $view = new ListadoConsultas();
                    $view->show($this->parametrosDeSesion(array('resultados' => ConsultaRepository::singleton()->consultas())));
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de pacientes');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

        public function modificarConsulta() {
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_update', $_SESSION["id"])) {
                    if(isset($_POST["id_consulta"]) && isset($_POST["motivo"]) && isset($_POST["derivacion"]) && isset($_POST["articulacion"]) && isset($_POST['internacion']) && isset($_POST['diagnostico']) && isset($_POST['observaciones']) && isset($_POST['tratamiento']) && isset($_POST['acompanamiento'])) {
                        ConsultaRepository::singleton()->actualizarConsulta($_POST["id_consulta"],$_POST['motivo'],$_POST['derivacion'],$_POST['articulacion'],$_POST['internacion'],$_POST['diagnostico'],$_POST['observaciones'],$_POST['tratamiento'],$_POST['acompanamiento']);
                    } else {
                        $this->redireccionarError('Error en los campos', 'Alguno de los campos obligatorios esta vacio');
                    }
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios para actualizar la informacion de pacientes');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

        public function borrarConsulta() {
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_delete', $_SESSION["id"])) {
                    if(isset($_POST["id_consulta"])) {
                        ConsultaRepository::singleton()->borrarConsulta($_POST["id_consulta"]);
                    } else {
                        $this->redireccionarError('Error en los campos', 'Alguno de los campos obligatorios esta vacio');
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