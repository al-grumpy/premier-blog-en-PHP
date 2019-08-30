<?php

namespace App\Controller;

use App\DAO\UserDAO;
use App\Model\View;

class UserController
{
    private $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

    public function inscription($post)
    {
        if(isset($post['submit'])) {
            $userDAO = new UserDAO();
            $userDAO->inscription($post); 
            session_start();
            $_SESSION['inscription'] = 'Vous êtes bien inscrit, connectez-vous pour déposer vos articles.';
            header('Location: ../public/index.php'); //Doit renvoyer sur formConnexion
        }
        $this->view->render('inscription', [
            'post' => $post
        ]);
    }
    public function login($post)
    {
        if(isset($post['submit'])){
            $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $isPassCorrect = password_verify($_POST['pass'], $pass_hash);
            if(!$isPassCorrect) {
                echo 'Mauvais identifiant ou mot de passe incorrect';
            }
            else{
                if($isPassCorrect){
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    echo 'Vous êtes bien connecté !';
                }
                else{
                    echo 'Mauvais identifiant ou mot de passe incorrect';
                }
            }
        }
            
    }

    public function forgetPass()
    {

    }
}