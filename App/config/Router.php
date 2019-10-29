<?php

namespace App\config;

use App\Controller\BackController;
use App\Controller\ErrorController;
use App\Controller\FrontController;
use App\Controller\UserController;
use App\Controller\PostController;
use App\Controller\CommentController;

class Router
{
    private $frontController;
    private $backController;
    private $userController;
    private $postController;
    private $commentController;
    private $errorController;
    
    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->userController = new UserController();
        $this->postController = new PostController();
        $this->commentController = new CommentController();
        $this->errorController = new ErrorController();
    }
    
    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] ==='article'){
                    $this->postController->article($_GET['idArt']);
                }
                else if($_GET['route'] === 'allArticles') {
                    $this->postController->allArticles();
                }
                else if($_GET['route'] === 'allUsers') {
                    $this->userController->allUsers();
                }
                else if($_GET['route'] === 'allCommentsWaiting') {
                    $this->commentController->allCommentsWaiting();
                }
                else if($_GET['route'] === 'user') {
                    $this->userController->user($_GET['idUser']);
                }
                else if($_GET['route'] === 'deleteUser') {
                    $this->userController->deleteUser($_POST);
                }
                else if($_GET['route'] === 'addArticle') {
                    $this->postController->addArticle($_POST);
                }
                else if($_GET['route'] === 'updateArticle') {
                    $this->postController->updateArticle($_POST);
                }
                else if($_GET['route'] ==='addComment') {
                    $this->commentController->addComment($_POST);
                }
                else if($_GET['route'] ==='inscription') {
                    $this->userController->inscription();
                }
                else if($_GET['route'] ==='login') {
                    $this->userController->login();
                }
                else if($_GET['route'] ==='logout') {
                    $this->userController->logout();
                }
                else{
                    $this->errorController->unknown();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->error();
        }
    }
}