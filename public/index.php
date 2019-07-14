<?php

require '../config/Autoloader.php';
\App\config\Autoloader::register();

try{
    if(isset($_GET['route']))
    {
        if($_GET['route'] === 'article'){
            $idArt = $_GET['idArt'];
            require '../templates/single.php';
        }
        else{
            echo 'page inconnue';
        }
    }
    else{
        require '../templates/home.php';
    }
}
catch (Exception $e)
{
    echo 'Erreur';
}