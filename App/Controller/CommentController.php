<?php

namespace App\Controller;

use App\DAO\CommentDAO;
use App\DAO\ArticleDAO;
use App\Model\View;
use App\Model\UserDAO;

class CommentController
{
    private $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

    public function addComment($post) 
    {
        if(isset($post['submit_comment']) && !isset($_SESSION['pseudo']) ) {
            session_start();
            $_SESSION['flash'] = 'Connectez-vous ou inscrivez-vous afin de pouvoir déposer des commentaires !';
            header('Location: ../public/index.php?route=article&idArt='.$post['article_id']);
        }

        if(isset($post['submit_comment']) && isset($_SESSION['login'])) {
            $commentDAO = new CommentDAO();
            $commentDAO->addComment($post);
            session_start();
            $_SESSION['add_comment'] = 'Votre commentaire à bien été envoyé, il sera déposé après validation par un admin. <br>Merci pour votre patience!';
            header('Location: ../public/index.php?route=article&idArt='.$post['article_id']);
        }
        $this->view->render('add_comment', [
            'post' => $post
        ]);
    }


}