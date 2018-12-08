<?php

    require_once 'model/ConsultaRepository.php';
    require_once 'model/PacientesRepository.php';
    require_once 'controller/RooterController.php';
    require_once 'views/CreacionConsulta.php';

    class ConsultaController extends Controller{

        public function insertarConsulta(){
            try { 
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_new', $_SESSION["id"])){
                    if(isset($_POST["id-paciente"]) && isset($_POST['fecha']) && isset($_POST["motivo"]) && isset($_POST["derivacion"]) && isset($_POST["articulacion"]) && isset($_POST['diagnostico']) && isset($_POST['observaciones']) && isset($_POST['tratamiento']) && isset($_POST['acompanamiento'])) {
                        $id = $_POST["id-paciente"];
                        ConsultaRepository::singleton()->crearConsulta($id,$_POST['fecha'],$_POST['motivo'],$_POST['derivacion'],$_POST['articulacion'],isset($_POST['internacion']),$_POST['diagnostico'],$_POST['observaciones'],$_POST['tratamiento'],$_POST['acompanamiento']);
                        header("location:index.php?comando=info-paciente&id=$id");
                    } else {
                        $this->redireccionarError('Error en los campos', 'Alguno de los campos obligatorios esta vacio'); 
                    }
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios.');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

        public function redireccionarCreacionConsulta(){
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_show', $_SESSION["id"])) {
                    $view = new CreacionConsulta();
                    if (isset($_POST['id']) && isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["apellido"])) {
                        $view->show($this->parametrosDeSesion(array('usuario_cargado' => $_POST['nombre'] . " " . $_POST["apellido"], "dni" => $_POST["dni"], "id" => $_POST["id"])));                
                    } else {
                        $view->show($this->parametrosDeSesion());
                    }
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios.');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

        public function redireccionarEdicionConsulta(){
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_update', $_SESSION["id"])) {
                    $view = new EdicionConsulta();
                    $view->show($this->parametrosDeSesion(array('consulta' => ConsultaRepository::singleton()->consultaConId($_GET['id']))));
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios.');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

        public function actualizarConsulta() {
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_update', $_SESSION["id"])) {
                    var_dump($_POST);
                    if(isset($_POST["motivo"]) && isset($_POST["derivacion"]) && isset($_POST["articulacion"]) && isset($_POST['diagnostico']) && isset($_POST['observaciones']) && isset($_POST['tratamiento']) && isset($_POST['acompanamiento'])) {
                        ConsultaRepository::singleton()->actualizarConsulta($_GET["id"],$_POST['motivo'],$_POST['derivacion'],$_POST['articulacion'],isset($_POST['internacion']),$_POST['diagnostico'],$_POST['observaciones'],$_POST['tratamiento'],$_POST['acompanamiento']);
                        $paciente = PacientesRepository::singleton()->pacienteConHistoria($_POST['paciente'])[0];
                        header("location:index.php?comando=info-paciente&id=$paciente");
                    } else {
                        $this->redireccionarError('Error en los campos', 'Alguno de los campos obligatorios esta vacio');
                    }
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios.');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

        public function borrarConsulta() {
            try {
                if(UsuariosRepository::singleton()->chequearPermiso('consulta_destroy', $_SESSION["id"])) {
                    if(isset($_GET["id-consulta"])) {
                        ConsultaRepository::singleton()->borrarConsulta($_GET["id-consulta"]);
                        header("location:index.php?comando=busqueda-pacientes");
                    } else {
                        $this->redireccionarError('Error en los campos', 'Alguno de los campos obligatorios esta vacio');
                    }
                } else {
                    $this->redireccionarError('Error de permisos', 'No cuentas con los permisos necesarios.');
                }
            } catch (Exception $e) {
                $this->redireccionarError('Error en la base de datos', $e->getMessage());
            }
        }

    }
?>