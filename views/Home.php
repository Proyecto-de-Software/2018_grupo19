<?php

require_once 'TwigView.php';

class Home extends TwigView {

    public function show() {
        echo self::getTwig()->render('home.html.twig');
    }
}