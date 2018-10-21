<?php

require_once 'TwigView.php';

class EdicionUsuario extends TwigView {

  public function show($usuario, $todosLosRoles, $rolesUsuario) {
    echo self::getTwig()->render('edicion-usuario.html.twig', array('usuario' => $usuario, 'todoslosroles' => $todosLosRoles, 'rolesUsuario' => $rolesUsuario));
  }
}

?>
