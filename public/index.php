<?php

require '../config/dev.php';
require '../vendor/autoload.php';

$router = new \App\config\Router();
$router->run();

//Routing
//$page = 'home';

//if (isset($_GET['p'])) {
 //   $page = $_GET['p'];
//}

//Récupère les derniers articles
function articles() {
    $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $articles = $pdo->query('SELECT title, chapo, author, date_added FROM article ORDER BY id DESC LIMIT 3');

    return $articles;
}

 //Rendu du template
$loader = new Twig_Loader_Filesystem(__DIR__ . '\templates');
$twig = new Twig_Environment($loader, [
    'cache' => false // __DIR__ . '/tmp'
]);


$twig->addGlobal('current_page', $page);

switch ($page) {
    case 'contact':
        echo $twig->render('contact.twig');
        break;
    case 'home':
        echo $twig->render('home.twig', ['articles' => articles()]);
        break;
    case 'article':
        echo $twig->render('single.twig', ['article' => [
            'id' => '$article_id'
        ]]);
        break;
    case 'login':
        echo $twig->render('login.twig');
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('404.twig');
        break;
}



