<?php

require_once 'TwigView.php';

class InfoPaciente extends TwigView {

    public function show($parametros) {

        /* Se le debe enviar el paciente reemplazando cada clave foranea por el valor correspondiente. Por ejemplo paciente[genero_id] == 'Masculino' en lugar de 1.
        Así con todos. */

        /* Se le debe agregar la key paciente[nombre_partido] con el partido obtenido mediante la región santaria. */

        echo self::getTwig()->render('info-paciente.html.twig',$parametros);
    }
}

?>