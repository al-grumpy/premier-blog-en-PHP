<?php

abstract class Database
{
    const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    private $connection;
    
    private function checkConnection()
    {
        if($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }
    
    //Méthode de connexion à la BdD
    private function getConnection()
    {
        try{
            $this->connection = new PDO(self::DB_HOST, self::DB_USER , self::DB_PASS); 
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Renvoi de la connexion
            return $this->connection;
        }
        
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