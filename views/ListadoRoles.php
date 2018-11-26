<?php

require_once 'TwigView.php';

class ListadoRoles extends TwigView {

    public function show($roles) {
        echo self::getTwig()->render('listado-roles.html.twig', $roles);
    }
}

?>
