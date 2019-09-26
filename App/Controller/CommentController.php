<?php

namespace App\Controller;

use App\DAO\CommentDAO;
use App\DAO\ArticleDAO;
use App\Model\View;

class CommentController
{
    private $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

    public function addComment($post) //A basculer dans CommentController avec condition de connexion
    {
        if(isset($post['submit'])) {
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

    public function deleteComment()
    {
        //fonction supression de commentaire par son autheur ou par Admin
    }
}