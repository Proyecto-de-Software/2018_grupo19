<?php
require_once 'composer/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

$template = $twig->load('index.html');
echo $template->render();
?>
