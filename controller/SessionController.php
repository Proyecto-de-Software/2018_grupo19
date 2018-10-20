<?php

/*
**  Controladores relacionados al manejo de sesiones
*/

class SessionController extends Controller{

    public function redireccionarHome(){
        $view = new Home();
        if(!isset($_SESSION['id'])) {
          $view->showHome();
        } else {
          //Chequear administrador
          if($_SESSION['id'] == 1) {
            $view->showHomeAdministrador();
          } else {
            $view->showHomeLogueado();
          }
        }
      }

    public function login(){
        if(SesionRepository::singleton()->iniciarSesion($_POST['usuario'], $_POST['contrasena'])){
            $this->redireccionarHome();
        } else {
            // Codigo en caso de inicio incorrecto
        }
    }

    public function redireccionarLogin(){
        $view = new Login();
        $view->show();
    }

    public function closeSession() {
        $view = new Home();
        $view->showHome();
    }

    public function redireccionarLoginObligatorio() {
        // Nothing
    }

}
