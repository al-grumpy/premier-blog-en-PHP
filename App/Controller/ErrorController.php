<?php

namespace App\Controller;

use App\Model\View;

class ErrorController
{
    public function unknown()
    {
        require '../public/templates/unknown.php';
    }
    
    public function error()
    {
        require '../public/templates/error.php';
    }
}