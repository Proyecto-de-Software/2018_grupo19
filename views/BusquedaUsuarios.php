<?php

require_once 'TwigView.php';
require_once 'model/UsuariosRepository.php';
require_once 'controller/SessionController.php';

class BusquedaUsuarios extends TwigView {

  public function show($parametros) {
    //var_dump($parametros);
    echo self::getTwig()->render('busqueda-usuarios.html.twig',$parametros);
  }
}

?>
