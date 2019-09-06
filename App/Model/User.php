<?php

namespace App\Model;

class User
{
    private $id;
        
    private $pseudo;
    
    private $pass;

    private $mail;

    public function __construct()
    {
        $this->droit = 'user';
    }

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
    private function getPass()
    {
        return $this->pass;
    }
    
    /**
    * @param mixed $pass
    */
    private function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    private function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    private function setMail($mail)
    {
        $this->mail = $mail;
    }
}

