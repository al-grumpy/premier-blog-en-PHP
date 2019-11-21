<?php

namespace App\Controller;

use App\DAO\ArticleDAO;
use App\DAO\CommentDAO;
use App\Model\View;

class FrontController
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
    
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        $this->view->render('home', [
            'articles' => $articles
        ]);
    }

    public function contact()
    {
        $this->view->render('contact');
    }
}