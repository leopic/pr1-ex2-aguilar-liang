<?php

namespace App\Services;

use \PDO;
use \PDOException;

class pdoService {
   
    private $pdo;
    public function __construct() {
        
        require("database.php");
        
        $this->pdo = new PDO(
            "mysql:host={$config['db_host']};dbname={$config['db_name']}",
            $config['db_user'], $config['db_pass']
        );
       
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    }
   
    public function query($query, $params=[]) {
        $cuentaDeRegistrosAfectados = null;
        
        $result = [
            "data" => null
        ];
        $isInsert = $this->esInsert($query);
        $isDelete = $this->esDelete($query);
        $isUpdate = $this->esUpdate($query);
        $isSelect = $this->esSelect($query);
        try {
            
            $stmt = $this->pdo->prepare($query);
            if ($isDelete) {
                $finalQuery = $query;
                
                foreach ($params as $key => $value) {
                    if (is_int($value)) {
                        $finalQuery = str_replace($key, $value, $finalQuery);
                    } else {
                        $finalQuery = str_replace($key, "'$value'", $finalQuery);
                    }
                }
                $cuentaDeRegistrosAfectados = $this->pdo->exec($finalQuery);
            } else {
                $stmt->execute($params);
            }
            if ($isSelect) {
                
                while ($content = $stmt->fetch()) {
                    $result["data"][] = $content;
                }
                
                $cuentaDeRegistrosAfectados = count($result["data"]);
            }
            if ($isInsert) {
                
                $result["meta"]["id"] = $this->pdo->lastInsertId();
            }
            if ($isUpdate || $isInsert) {
                
                $cuentaDeRegistrosAfectados = $stmt->rowCount();
            }
        } catch (PDOException $e) {
           
            $result["error"] = true;
            $result["message"] = $e->getMessage();
        }
        if (isset($cuentaDeRegistrosAfectados)) {
            $result["meta"]["count"] = $cuentaDeRegistrosAfectados;
        }
        return $result;
    }
    
    private function esSelect($query) {
        return $this->revisarTipoDeQuery($query, "SELECT");
    }
    
    private function esInsert($query) {
        return $this->revisarTipoDeQuery($query, "INSERT");
    }
    
    private function esUpdate($query) {
        return $this->revisarTipoDeQuery($query, "UPDATE");
    }
    
    private function esDelete($query) {
        return $this->revisarTipoDeQuery($query, "DELETE");
    }
    
    private function revisarTipoDeQuery($query, $tipo) {
        return substr_count(strtoupper($query), $tipo) > 0;
    }
}