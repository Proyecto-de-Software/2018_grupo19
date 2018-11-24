<?php

require_once 'controller/Controller.php';
require_once 'controller/SessionController.php';
require_once 'controller/AdministradorController.php';
require_once 'controller/UsuarioController.php';
require_once 'controller/PacienteController.php';
require_once 'controller/AjaxController.php';
require_once 'controller/ConsultaController.php';

/*
Clase que se encarga del rooteo
*/

class RooterController extends Controller{

    public function redireccionar($comando){

        if(!isset($_SESSION)){session_start();}

        if(!AdministradorController::singleton()->verificarEstadoDelSitio($comando)){
            AdministradorController::singleton()->redireccionarSitioEnMantenimiento();
            exit();
        }

        if(!isset($_SESSION["id"])) {

            switch ($comando) {

                case 'iniciar-sesion':
                SessionController::singleton()->login();
                break;

                case 'login':
                SessionController::singleton()->redireccionarLogin();
                break;

                default:
                $this->home();
                break;

            }

        } else {

            switch ($comando) {

                /*
                ** Session rooter
                */

                case 'cerrar-sesion':
                SessionController::singleton()->closeSession();
                break;

                /*
                ** Administrador rooter
                */

                case 'configuracion':
                AdministradorController::singleton()->redireccionarConfiguracion();
                break;

                case 'sitio-en-mantenimiento':
                AdministradorController::singleton()->redireccionarSitioEnMantenimiento();
                break;

                case 'cambio-configuracion':
                AdministradorController::singleton()->actualizarConfiguracion();
                break;

                /*
                ** Usuarios rooter
                */

                case 'busqueda-usuarios':
                UsuarioController::singleton()->redireccionarBusquedaUsuarios();
                break;

                case 'creacion-usuario':
                UsuarioController::singleton()->redireccionarCreacionUsuario();
                break;

                case 'insertar-usuario':
                UsuarioController::singleton()->insertarUsuario();
                break;

                case 'edicion-usuario':
                UsuarioController::singleton()->redireccionarEdicionUsuario();
                break;

                case 'borrar-usuario':
                UsuarioController::singleton()->borrarUsuario();
                break;

                case 'info-usuario':
                UsuarioController::singleton()->redireccionarInfoUsuario();
                break;

                case 'actualizar-usuario':
                UsuarioController::singleton()->actualizarUsuario();
                break;

                /*
                ** Pacientes rooter
                */

                case 'busqueda-pacientes':
                PacienteController::singleton()->redireccionarBusquedaPacientes();
                break;

                case 'creacion-paciente':
                PacienteController::singleton()->redireccionarCreacionPacientes();
                break;

                case 'creacion-paciente-nn':
                PacienteController::singleton()->redireccionarCreacionPacientes(true);
                break;

                case 'insertar-paciente':
                PacienteController::singleton()->insertarPaciente();
                break;

                case 'insertar-paciente-nn':
                PacienteController::singleton()->insertarPaciente(true);
                break;

                case 'info-paciente':
                PacienteController::singleton()->redireccionarInfoPaciente();
                break;

                case 'editar-paciente':
                PacienteController::singleton()->redireccionarEditarPaciente();
                break;

                case 'actualizar-paciente':
                PacienteController::singleton()->actualizarPaciente();
                break;

                case 'borrar-paciente':
                PacienteController::singleton()->borrarPaciente();
                break;

                /*
                ** Pedidos AJAX
                */

                case 'obtener-partidos':
                AjaxController::singleton()->obtenerPartidos();
                break;

                case 'obtener-generos':
                AjaxController::singleton()->obtenerGeneros();
                break;

                case 'obtener-tipos-doc':
                AjaxController::singleton()->obtenerTiposDeDocumento();
                break;

                case 'obtener-obras-sociales':
                AjaxController::singleton()->obtenerObrasSociales();
                break;

                case 'obtener-region-sanitaria':
                AjaxController::singleton()->obtenerRegionSanitaria();
                break;

                case 'obtener-localidades':
                AjaxController::singleton()->obtenerLocalidades();
                break;

                
                /*
                ** Consultas router
                */

                case 'creacion-consulta':
                ConsultaController::singleton()->redireccionarCreacionConsulta();
                break;

                case 'insertar-consulta':
                ConsultaController::singleton()->insertarConsulta();
                break;

                case 'editar-consulta':
                ConsultaController::singleton()->modificarConsulta();
                break;

                case 'borrar-consulta':
                ConsultaController::singleton()->borrarConsulta();
                break;
                

                /*
                ** Default
                */
                
                case 'feriados':
                UsuarioController::singleton()->mostrarPaginaFeriados();
                break; 
                
                default:
                RooterController::singleton()->home();
                break;
            }

        }
    }
}
