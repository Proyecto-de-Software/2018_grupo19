<?php

require_once 'TwigView.php';

class Home extends TwigView {

    public function show($parametrosDeSesion) {
        echo self::getTwig()->render('home.html.twig',$parametrosDeSesion);
    }

}

?>
