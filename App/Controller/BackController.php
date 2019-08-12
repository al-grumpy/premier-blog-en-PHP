<?php

namespace App\Controller;

use App\DAO\ArticleDAO;
use App\DAO\CommentDAO;
use App\Model\View;

class BackController
{
    private $view;
    
    public function __construct()
    {
        $this->view = new View();
    }
    
    public function addArticle($post)
    {
        if(isset($post['submit'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            session_start();
            $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
            header('Location: ../public/index.php');
        }
        $this->view->render('add_article', [
            'post' => $post
        ]);
    }
    
    public function addComment($post)
    {
        if(isset($post['submit'])) {
            $commentDAO = new CommentDAO();
            $commentDAO->addComment($post);
            session_start();
            $_SESSION['add_comment'] = 'votre commentaire à bien été posté !';
            header('Location: ../public/index.php?route=article&idArt='.$post['article_id']);
        }
        $this->view->render('add_comment', [
            'post' => $post
        ]);
    }
    public function login()
    {
        
    }
}