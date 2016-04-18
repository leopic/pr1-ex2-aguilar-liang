<?php
namespace App\Controllers;

use \App\Services\GamesService;
use Slim\Http\Request;


/**
 *
 */
class GamesController
{
    private $gamesService;

    public function __construct()
    {
        $this->gamesService = new GamesService();
    }

    public function getList($request) {
        /** @var Request $request */
        return $this->gamesService->getList();
    }
    /**
     * @param $request
     * @return array
     */
    public function getById($request) {
        /** @var Request $request */
        $id = $request->getAttribute("id", null);
        return $this->gamesService->getById($id);
    }
    /**
     * @param $request
     * @return array
     */
    public function delete($request) {
        /** @var Request $request */
        $id = $request->getAttribute("id", null);
        return $this->gamesService->delete($id);
    }
    /**
     * @param $request
     * @return array
     */
    public function create($request) {
        /** @var Request $request */
        $formData = $request->getParsedBody();
        $title = null;
        $description = null;
        $image = null;
        $name = null;
        $console = null;
        $num = null;
        $sDate = null;
        if (array_key_exists("title", $formData)) {
            $title = $formData["title"];
        }
        if (array_key_exists("description", $formData)) {
            $description = $formData["description"];
        }
        if (array_key_exists("image", $formData)) {
            $image = $formData["image"];
        }
        if (array_key_exists("name", $formData)) {
            $name = $formData["name"];
        }
        if (array_key_exists("console", $formData)) {
            $console = $formData["console"];
        }
//        NUM no está en el API tasks, lo comenté
//        if (array_key_exists("num", $formData)) {
//            $num = $formData["num"];
//        }
        if (array_key_exists("sDate", $formData)) {
            $sDate = $formData["sDate"];
        }
        return $this->gamesService->create($title, $description, $image, $name, $console, $sDate);
    }
    public function edit($request) {
        /** @var Request $request */
        $formData = $request->getParsedBody();
        $title = null;
        $description = null;
        $image = null;
        $name = null;
        $console = null;
        $sDate = null;
        $id = null;
        if (array_key_exists("title", $formData)) {
            $title = $formData["title"];
        }
        if (array_key_exists("description", $formData)) {
            $description = $formData["description"];
        }
        if (array_key_exists("image", $formData)) {
            $image = $formData["image"];
        }
        if (array_key_exists("name", $formData)) {
            $name = $formData["name"];
        }
        if (array_key_exists("console", $formData)) {
            $console = $formData["console"];
        }
        if (array_key_exists("sDate", $formData)) {
            $sDate = $formData["sDate"];
        }
        $id = $request->getAttribute("id", null);
        return $this->gamesService->edit($id, $title, $description, $image, $name, $console, $sDate);
    }
}
?>