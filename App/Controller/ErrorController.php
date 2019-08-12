<?php

namespace App\Controller;

use App\Model\View;

class ErrorController
{
    public function unknown()
    {
        require '../templates/unknown.php';
    }
    
    public function error()
    {
        require '../templates/error.php';
    }
}