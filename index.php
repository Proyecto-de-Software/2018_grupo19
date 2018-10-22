<?php
require_once 'composer/vendor/autoload.php';
require_once 'controller/RooterController.php';

if (isset($_GET['comando'])) {
  RooterController::singleton()->redireccionar();
} else {
  $_GET['comando'] = '';
  RooterController::singleton()->redireccionar();
}

?>
