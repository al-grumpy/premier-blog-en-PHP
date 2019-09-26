<?php

namespace App\Controller;

use App\DAO\UserDAO;
use App\Model\View;

class UserController
{
    private $view;
    
    public function __construct()
    {
        $this->userDAO = new userDAO();
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
            $errors['pseudo'] = 'Ce pseudo n\'est pas disponible.';
        }

        if (empty($errors)) {
            $userDAO->inscription($_POST); 
            session_start();
            $_SESSION['inscription'] = 'Vous êtes bien inscrit, connectez-vous pour déposer vos articles.';
            header('Location: ../public/index.php'); //Doit renvoyer sur formConnexion
        }   
        $this->view->render('inscription');
    }


    public function login()
    {
        if (isset($_POST['submit_login'])) {
            
            if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {

                $userDAO = new UserDAO();
                if ($userDAO->isUsernameExist($_POST['pseudo'])) { 

                    $postName = htmlspecialchars($_POST['pseudo']);
                    $postPass = htmlspecialchars($_POST['pass']);
                    $userPass = $userDAO->getUserByName($postName);
                    var_dump($userPass['pass']);
                    var_dump($postPass);
                    

                    if (!password_verify($postPass, $userPass['pass'])) {
                        var_dump($postPass);
                        session_start();
                        $_SESSION['login'] = 'Vous êtes bien connecté, vous pouvez déposer vos articles!';
                        header('Location: ../public/index.php?route=userConnect'); //Doit renvoyer sur formConnexion
                    }
                    
                    return 'Identifiant ou mot de passe incorrect';
                }

                return 'Identifiant ou mot de passe incorrect'; 
            }
            else {
                $error = "Erreur";
            }
        }      
        
    }

    public function allUsers()
    {
        $users = $this->userDAO->getUsers();
        $this->view->render('all_users', [
            'users' => $users
        ]);
    }

    public function user($id)
    {
        $user = $this->userDAO->getUser($id);
        
        $this->view->render('profil', [
            'user' => $user,
        
        ]);
    }

    public function getUser()
    {
        //Accessible par Admin pour voir tous ou une partie des user 
    }

    public function deleteUser()
    {
        //Accessible par Admin pour supprimer un user ou par user pour supprimer son propre compte
        if (isset($_POST['submit_delete'])) {

            $userDAO = new UserDAO();
            if ($userDAO->isUsernameExist($_POST['pseudo'])) {

                $userName = $userDAO->deleteUser($_POST['pseudo']);
                session_start();
                $_SESSION['delete_user'] = 'L\'utilisateur à bien été supprimé !';
                header('Location: ../public/index.php?route=allUser');
            }
            $this->view->render('delete_user', [
                'post' => $post
            ]);           
        }
    }

    public function forgetPass()
    {
        //Accessible par tous Admin et User en cas de Mdp oublié

    }
}