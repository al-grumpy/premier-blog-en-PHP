<?php

namespace App\src\DAO;

use PDO;

abstract class DAO
{
    const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    
    private $connection;
    
    private function checkConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if($this->connection === null) {
            return $this->getConnection();
        }
        //Si la connexion existe, elle est renvoyée, pas besoin de refaire une connexion
        return $this->connection;
        
    }
    
    //Méthode de connexion à la BdD
    private function getConnection()
    {
        //Tentative de connexion a la BdD
        try{
            $this->connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Renvoi de la connexion
            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }
    
    protected function sql($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        else{
            $result = $this->checkConnection()->query($sql);
            return $result;
        }
    }
}