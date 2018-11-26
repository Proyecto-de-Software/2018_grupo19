<?php
require_once './vendor/autoload.php';
require_once './model/InstitucionesRepository.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

    $config = [
        'settings' => [
        'displayErrorDetails' => true,
            ],
        ];

        $appSlim = new \Slim\App($config);

        $appSlim->get('/instituciones',  function ($request, $response){
            return $response->withJson(InstitucionesRepository::singleton()->getInstituciones(), 200);
        });

        $appSlim->get('/institucion/{id}', function ($request, $response, $args){
            return $response->withJson(InstitucionesRepository::singleton()->getInstitucionById($args['id']), 200);
        });

        $appSlim->get('/instituciones/region-sanitaria/{id}', function ($request, $response, $args){
            return $response->withJson(InstitucionesRepository::singleton()->getInstitucionesByRegion($args['id']), 200);
        });

        $appSlim->run();

?>
