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
        //Vérification des erreurs lors de la saisie 
        if (empty($_POST) || !isset($_POST['submit'])) {
            return $this->view->render('inscription');
        }

        $errors = [];
        if (empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
            $errors['pseudo'] = 'Votre pseudo est vide ou non valide';
        }

        if (empty($_POST['mail']) || !filter_var($_POST['mail'] , FILTER_VALIDATE_EMAIL)){
            $errors['mail'] = 'Votre email est vide ou non valide';
        }
        
        if (empty($_POST['pass']) || $_POST['pass'] !== $_POST['pass_confirm']){
            $errors['pass'] = 'Les mots de passe sont différents';
        }

        $userDAO = new UserDAO();
        if ($userDAO->isUsernameExist($_POST['pseudo'])) {
            $errors['pseudo'] = 'Ce pseudo n\'est pas disponible.';
        }
        //Si aucune erreur on valide l'inscription en passant par la methode inscription
        if (empty($errors)) {
            $userDAO->inscription($_POST); 
            session_start();
            $_SESSION['inscription'] = 'Vous êtes bien inscrit, connectez-vous pour déposer vos commentaires.';
            header('Location: ../public/index.php'); //Doit renvoyer sur formConnexion
        }
       
        $this->view->render('inscription');
    }

    //Se connecter
    public function login()
    {
        //Si les champs du formulaire sont envoyés vide alors retour formulaire connexion
        if (!isset($_POST['submit_login']) || (empty($_POST['pseudo']) || empty($_POST['pass']))) {
            return $this->view->render('login');
        }
        
        //Stockage des variables entrées pour la connexion et hash du mot de passe 
        $userDAO = new UserDAO();
        $postName = htmlspecialchars($_POST['pseudo']);
        $postPass = htmlspecialchars($_POST['pass']);
        $postPass = hash('sha512', $postPass);

        //Vérification des données entrées avec celles stockées dans la BDD avec méthode getUserByNameAndPassword()
        $user = $userDAO->getUserByNameAndPassword($postName, $postPass);

        //Si données incorrect affichage message erreur
        if (empty($user)) {
            return 'Identifiant ou mot de passe incorrect';
        }

        //Lance une session et stock les information de l'utilisateur connecté
        session_start();
        $_SESSION['login'] = 'Vous êtes bien connecté, vous pouvez déposer vos commentaires.';
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['droit'] = $user['droit'];
        $_SESSION['pseudo_id'] = $user['id'];
        header('Location: ../public/index.php'); //Doit renvoyer sur formConnexion
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../public/index.php'); 
        exit();
        
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

}