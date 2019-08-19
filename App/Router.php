<?php

namespace App\config\Router;

use App\Controller\BackController;
use App\Controller\ErrorController;
use App\Controller\FrontController;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    
    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }
    
    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] ==='article'){
                    $this->frontController->article($_GET['idArt']);
                }
                else if($_GET['route'] === 'addArticle') {
                    $this->backController->addArticle($_POST);
                }
                else if($_GET['route'] ==='addComment') {
                    $this->backController->addComment($_POST);
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