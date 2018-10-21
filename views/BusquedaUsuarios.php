<?php

require_once 'TwigView.php';
require_once 'model/UsuariosRepository.php';

class BusquedaUsuarios extends TwigView {

  public function show($usuarios) {
    echo self::getTwig()->render('busqueda-usuarios.html.twig',$usuarios);
  }
}

?>
