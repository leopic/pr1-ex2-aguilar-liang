<?php
	namespace services;

	class gamesService{
		private $storage;

		public function __construct() {
	        $this->storage = new pdoService();

    	}
    	//Retrieves game by its ID
    	public function getById($id) {
        $response = [];
        if ($this->validation->isValidInt($id)) {
            
            //Current query
            $query = "SELECT title, description, image, name, console, sDate FROM videojuegos WHERE id = :id";
      		
      		//Set the id into the params 
            $params = [":id" => intval($id)];
            

            $resultQuery = $this->storage->query($query, $params);
            
            $find = array_key_exists("meta", $resultQuery) &&
                $resultQuery["meta"]["count"] == 1;
            if ($find) {
                $response["message"] = "get video game.";
                $game = $resultQuery["data"][0];
                $response["data"] = [
                    "id" => $id,
                    "title" => $game["title"],
                    "description" => $game["description"],
                    "name" => $game["name"],
                    "image" => $game["image"],
                    "console" => $game["console"],
                    "sDate" => $game["sDate"]
                ];
            } else {
                $response["message"] = "error.";
                $response["error"] = true;
            }
        } else {
            $response["message"] = "id required.";
            $response["error"] = true;
        }
        return $response;
    }

    //Gets the list of all the games collection
    public function getList() {
        $response = [];
        $query = "SELECT id, title, description, image, name, console, sDate, num FROM videojuegos";
        $resultQuery = $this->storage->query($query);
        $find = array_key_exists("meta", $resultQuery) &&
            $resultQuery["meta"]["count"] > 0;
        if ($find) {
            $response["message"] = "find it.";
            $games = $resultQuery["data"];
            foreach ($games as $game) {
                $response["data"][] = [
                    "id" => $game["id"],
                    "title" => $game["title"],
                    "description" => $game["description"],
                    "name" => $game["name"],
                    "image" => $game["image"],
                    "console" => $game["console"],
                    "sDate" => $game["sDate"],
                    "num" => $game["num"]
                ];
            }
        } else {
            $response["message"] = "error";
            $response["error"] = true;
        }
        return $response;
    }

    //Creates the new game
    public function create($title, $description, $image, $name, $console, $sDate) {
        $response = [];
        if ($this->validation->isValidString($title)) {
            if ($this->validation->isValidString($description)) {
                if ($this->validation->isValidString($image)) {
                	if ($this->validation->isValidString($name)) {
                		if ($this->validation->isValidString($console)) {
         
		                    $query = "INSERT INTO noticias (title, description, image, name, console, sDate, num) VALUES (:title, :description, :image, :name, :console, :sDate, :num)";
		                    $params = [
		                        ":title" => $title,
		                        ":description" => $description,
		                        ":name" => $name,
		                        ":image" => $image,
		                        ":console" => $console,
		                        ":sDate" => $sDate,
		                        ":num" => $num
		                    ];
		                    $resultQuery = $this->storage->query($query, $params);
		                    $isGameCreated = array_key_exists("meta", $resultQuery) && $resultQuery["meta"]["count"] == 1;
		                    if ($isGameCreated) {
		                        $response["message"] = "Game succesfully created";
		                        $response["meta"]["id"] = $resultQuery["meta"]["id"];
		                    } else {
		                        $response["error"] = true;
		                        $response["message"] = "Error creando noticia";
		                    }
		                } else {
		                	$response["error"] = true;
                    		$response["message"] = "console invalid";
		                }
		            } else{
		            	$response["error"] = true;
                    	$response["message"] = "name invalid";
		            }
                } else {
                    $response["error"] = true;
                    $response["message"] = "image invalid";
                }
            } else {
                $response["error"] = true;
                $response["message"] = "description invalid";
            }
        } else {
            $response["error"] = true;
            $response["message"] = "title invalid";
        }
        return $response;
    }

    //Edits the game by the id
    public function edit($id, $title, $description, $image, $name, $console, $sDate) {
        $response = [];
        if ($this->validation->isValidString($title)) {
            if ($this->validation->isValidString($description)) {
                if ($this->validation->isValidString($image)) {
                	if ($this->validation->isValidString($name)) {
                		if ($this->validation->isValidString($console)) {
		                    if ($this->validation->isValidInt($id)) {
		                        $query = "
		                                  UPDATE videojuegos SET title = :title,
		                                                      description = :description,
		                                                      name = :name,
		                                                      console = :console,
		                                                      sDate = :sDate,
		                                                      image = :image
		                                  WHERE id = :id
		                                ";
		                        $params = [
		                            ":title" => $title,
			                        ":description" => $description,
			                        ":name" => $name,
			                        ":image" => $image,
			                        ":console" => $console,
			                        ":sDate" => $sDate
		                            ":id" => $id,

		                        ];
		                        $resultQuery = $this->storage->query($query, $params);
		                        $gameEdited = array_key_exists("meta", $resultQuery) && $resultQuery["meta"]["count"] == 1;
		                        if ($gameEdited) {
		                            $response["message"] = "Game is updated";
		                        } else {
		                            $response["error"] = true;
		                            $response["message"] = "Error";
		                        }
		                    } else {
		                        $response["error"] = true;
		                        $response["message"] = "id invalid";
		                    }
		                } else {
	                        $response["error"] = true;
	                        $response["message"] = "console invalid.";
	                    }
                    } else {
                        $response["error"] = true;
                        $response["message"] = "name invalid.";
                    }
                } else {
                    $response["error"] = true;
                    $response["message"] = "image invalid";
                }
            } else {
                $response["error"] = true;
                $response["message"] = "description invalid";
            }
        } else {
            $response["error"] = true;
            $response["message"] = "title invalid";
        }
        return $response;
    }

    //deletes the game by the id
    public function delete($id) {
        $response = [];
        if ($this->validation->isValidInt($id)) {
            $id = intval($id);
            $query = "DELETE FROM videojuegos WHERE id = :id";
            $params = [":id" => $id];
            $resultQuery = $this->storage->query($query, $params);
            $gameDeleted = array_key_exists("meta", $resultQuery) && $resultQuery["meta"]["count"] == 1;
            if ($gameDeleted) {
                $response["message"] = "Game deleted.";
            } else {
                $response["message"] = "Imposible to find the game with the id $id.";
                $response["error"] = true;
            }
        } else {
            $response["message"] = "Id field is required";
            $response["error"] = true;
        }
        return $response;
    }

   
	}	
?>