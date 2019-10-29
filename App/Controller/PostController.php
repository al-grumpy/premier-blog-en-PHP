<?php

namespace App\Controller;

use App\DAO\ArticleDAO;
use App\DAO\CommentDAO;
use App\DAO\UserDAO;
use App\Model\View;

class PostController
{
    private $articleDAO;
    private $commentDAO;
    private $userDAO;
    private $view;
    
    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
    }

    public function allArticles()
    {
        $articles = $this->articleDAO->allArticles();
        $this->view->render('all_articles', [
            'articles' => $articles
        ]);
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

    public function article($id)
    {
        $article = $this->articleDAO->getArticle($id);
        $comments = $this->commentDAO->getCommentsFromArticle($id);
        $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function updateArticle($id)
    {
        if (isset($post['submit_modif']) && isset($_SESSION['admin'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->updateArticle($id);
            session_start();
            $_SESSION['update_article'] = 'Votre article à été mis à jour';
            header('Location: ../public/index.php?route=article&idArt='.$post['id']);
        }
        $this->view->render('update_article');
    }
}