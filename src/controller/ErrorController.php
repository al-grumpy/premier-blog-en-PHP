<?php

namespace App\src\controller;

use App\src\model\view;

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