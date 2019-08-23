<?php

namespace App\Model;

class User
{
    private $id;
        
    private $pseudo;
    
    private $password;

    /**
    * @return mixed
    */
    public function getId()
    {
        return $this->id;
    }
    
    /**
    * @param mixed $id
    */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /** 
    * @return mixed
    */
    public function getPseudo()
    {
        return $this->pseudo;
    }
    
    /**
    * @param mixed $pseudo
    */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
    
    /**
    * @return mixed
    */
    private function getPassword()
    {
        return $this->password;
    }
    
    /**
    * @param mixed $password
    */
    private function setPassword($password)
    {
        $this->password = $password;
    }
}

