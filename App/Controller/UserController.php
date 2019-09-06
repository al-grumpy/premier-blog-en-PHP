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

    

    public function inscription()
    {
        if (empty($_POST) || !isset($_POST['submit'])) {
            return $this->view->render('inscription');
        }

        $errors = [];
        if (empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
            $errors['pseudo'] = 'Votre pseudo est vide ou non valide';
        }

        if (empty($_POST['mail']) || !filter_var($_POST['mail'] , FILTER_VALIDATE_EMAIL)){
            $errors['mail'] = "Votre email est vide ou non valide";
        }
        
        if (empty($_POST['pass']) || $_POST['pass'] !== $_POST['pass_confirm']){
            $errors['pass'] = "Les mots de passe sont différents";
        }

        $userDAO = new UserDAO();
        if ($userDAO->isUsernameExist($_POST['pseudo'])) {
            $errors['pseudo'] = 'Ce pseudo est déjà pris';
        }

        if (empty($errors)) {
            $userDAO->inscription($_POST); 
            session_start();
            $_SESSION['inscription'] = 'Vous êtes bien inscrit, connectez-vous pour déposer vos articles.';
            header('Location: ../public/index.php'); //Doit renvoyer sur formConnexion
        }   
        $this->view->render('inscription');
    }


    public function login($post)
    {
        if(isset($post['submit'])){
            $passHashed = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $isPassCorrect = password_verify($_POST['pass'], $passHashed);
            if(!$isPassCorrect) {
                echo 'Mauvais identifiant ou mot de passe incorrect';
            }
            else{
                if($isPassCorrect){
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    echo 'Vous êtes bien connecté !';
                   // header('Location: ../index.php?route=userConnect');
                }
                else{
                    echo 'Mauvais identifiant ou mot de passe incorrect';
                }
            }
        }
            
    }

    public function getUser()
    {
        //Accessible par Admin pour voir tous ou une partie des user 
    }

    public function deleteUser()
    {
        //Accessible par Admin pour supprimer un user ou par user pour supprimer son propre compte
    }

    public function forgetPass()
    {
        //Accessible par tous Admin et User en cas de Mdp oublié
    }
}