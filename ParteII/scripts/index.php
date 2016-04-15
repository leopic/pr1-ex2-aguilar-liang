<?php

use Slim\Http\Request;
use Slim\Http\Response;
$app = new \Slim\App();

//Games List

$app->get(
    "/gamesService/getList",
    function ($request, $response) {

        $controller = new controllers\gamesControllers();
        $result = $controller->getList($request);
        return $response->withJson($result);
    }
);

//Specific game

$app->get(
    "/gamesService/{id}",
    function ($request, $response) {

        $controller = new controllers\gamesControllers();
        $result = $controller->getById($request);
        return $response->withJson($result)
    }
);

//Creates new game

$app->post(
    "/gamesService/create",
    function ($request, $response) {

        $controller = new controllers\gamesControllers();
        $result = $controller->create($request);
        return $response->withJson($result)
    }
);

//Edits game

$app->post(
    "/gamesService/edit/{id}",
    function ($request, $response) {

       $controller = new controllers\gamesControllers();
        $result = $controller->edit($request);
        return $response->withJson($result)
    }
);

//Deletes game

$app->get(
    "/gamesService/delete/{id}",
    function ($request, $response) {
        /** @var Response $response */
        $controller = new controllers\gamesControllers();
        $result = $controller->delete($request);
        return $response->withJson($result)
    }
);

$app->run();