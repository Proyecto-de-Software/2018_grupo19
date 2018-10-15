<?php

require_once 'TwigView.php';

class Configuracion extends TwigView {

  public function show() {
    echo self::getTwig()->render('configuracion.html.twig', array("titulo" => "Título del sitio", "mail" => "alekorn@yahoo.es", "desc" => "Esta es la descripción del hospital. Espero os guste, slds.", "cantElementos" => 5, "deshabilitado" => true));
  }
}

?>
