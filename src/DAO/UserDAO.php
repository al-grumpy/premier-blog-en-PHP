<?php

namespace App\src\DAO;

use App\src\model\User;

class UserDAO extends DAO
{
    public function login()
    {
        
    }
    
    public function inscription()
    {
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $req = $bdd->prepare('INSERT INTO user(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass_hache,
            'email' => $email
        ));   
    }
    
}