<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "vendor/autoload.php";

use App\Controllers\GamesController;
use Slim\Http\Request;
use Slim\Http\Response;

// Muestra todos los errores
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$contenedor = new \Slim\Container($configuration);
$slimApp = new \Slim\App($contenedor);

//Games List

$slimApp->get(
    "/gamesService/getList",
    function ($request, $response) {
        $controller = new GamesController();
        $result = $controller->getList($request);
        return $response->withJson($result);
    }
);

//Specific game

$slimApp->get(
    "/gamesService/{id}",
    function ($request, $response) {

        $controller = new GamesController();
        $result = $controller->getById($request);
        return $response->withJson($result);
    }
);

//Creates new game

$slimApp->post(
    "/gamesService/create",
    function ($request, $response) {

        $controller = new GamesController();
        $result = $controller->create($request);
        return $response->withJson($result);
    }
);

//Edits game

$slimApp->post(
    "/gamesService/edit/{id}",
    function ($request, $response) {

        $controller = new GamesController();
        $result = $controller->edit($request);
        return $response->withJson($result);
    }
);

//Deletes game

$slimApp->get(
    "/gamesService/delete/{id}",
    function ($request, $response) {
        /** @var Response $response */
        $controller = new GamesController();
        $result = $controller->delete($request);
        return $response->withJson($result);
    }
);

$slimApp->run();