<?php

namespace App\Controller;

use App\DAO\ArticleDAO;
use App\DAO\CommentDAO;
use App\Model\View;

class PostController
{
    private $articleDAO;
    private $commentDAO;
    private $view;
    
    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function addArticle($post) //A basculer dans ArticleController avec condition de connexion
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

    public function article($id)
    {
        $article = $this->articleDAO->getArticle($id);
        $comments = $this->commentDAO->getCommentsFromArticle($id);
        $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }
}