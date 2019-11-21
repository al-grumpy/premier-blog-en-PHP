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
        if (empty(htmlspecialchars($_POST)) || !isset($_POST['submit'])) {
            return $this->view->render('inscription');
        }

        $errors = array_filter([
            'pseudo' => empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', htmlspecialchars($_POST['pseudo'])) ? 'Votre pseudo est vide ou non valide' : null,
            'mail' => empty(htmlspecialchars($_POST['mail'])) || !filter_var(htmlspecialchars($_POST['mail'] , FILTER_VALIDATE_EMAIL)) ? 'Votre email est vide ou non valide' : null,
            'pass' => empty(htmlspecialchars($_POST['pass'])) || htmlspecialchars($_POST['pass']) !== htmlspecialchars($_POST['pass_confirm']) ? 'Les mots de passe sont différents' : null,
        ]);

        if (false === empty($errors)) {
            return $this->view->render('inscription', ['errors' => $errors]);
        }

        $userDAO = new UserDAO();
        if ($userDAO->isUsernameExist(htmlspecialchars($_POST['pseudo']))) {
            return $this->view->render('inscription', ['errors' => ['pseudo' => 'Ce pseudo n\'est pas disponible.']]);
        }

        $userDAO->inscription($_POST); 
        session_start();
        $_SESSION['inscription'] = 'Vous êtes bien inscrit, connectez-vous pour déposer vos commentaires.';
        header('Location: ../public/index.php');

        return $this->view->render('inscription');
    }

    //Se connecter
    public function login()
    {
        //Si les champs du formulaire sont envoyés vide alors retour formulaire connexion
        if (!isset($_POST['submit_login']) || (empty(htmlspecialchars($_POST)))) {
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