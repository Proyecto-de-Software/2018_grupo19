<?php

require_once 'TwigView.php';

class EditarRol extends TwigView {

    public function show($datosEditarRol) {
        echo self::getTwig()->render('editar-rol.html.twig',$datosEditarRol);
    }
}

?>
