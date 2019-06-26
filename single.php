<?php

require 'Database.php';
require 'Article.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon premier blog en PHP</h1>
        <p>C'est vide, mais ça va venir!</p>
        <?php 
        $article = new Article();
        $article = $article->getArticle($_GET['idArt']); 
        $data = $article->fetch()
        ?>
            <div>
                <h2><?= htmlspecialchars($data['title']);?></h2>
                <p><?= htmlspecialchars($data['content']);?></p>
                <p><?= htmlspecialchars($data['author']);?></p>
                <p>Crée le : <?= htmlspecialchars($data['date_added']);?></p>  
            </div>
        <br>
        <?php
        
        $articles->closeCursor();
        ?>
        <a href="home.php">Retour à la page accueil</a>
    </div>
</body>
</html>