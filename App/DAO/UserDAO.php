<?php

namespace App\DAO;

use App\Model\User;

class UserDAO extends DAO
{
    public function login()
    {
        $error = $pseudo = $pass = "";

        if(isset($_POST['pseudo'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $pass = htmlspecialchars($_POST['pass']);
            
            if($pseudo == "" || $pass == ""){
               $error = "Tous les champs doivent être remplis<br>";
            }
            else{
                $result = queryMySQL("SELECT pseudo,pass FROM user WHERE pseudo='$pseudo' AND pass='$pass'");
                if($result->num_rows == 0){
                    $error = "<span class='error'>Pseudo ou mot de passe non valide</span><br><br>";
                }
                else{
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['pass'] = $pass;
                    die("Vous êtes connecté.");
                }
            }
        }
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
    
    public function destroySession()
    {
        $_SESSION = array();
        //if(session_id() != || isset($_COOKIE[session_name()]))
          setcookie(session_name(), '', time()-2592000, '/');

        session_destroy();
    }
}