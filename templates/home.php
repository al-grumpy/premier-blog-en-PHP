<?php
//Ici le fichier dont on a besoin (à la racine du site)
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
        $articles = $article->getArticles();
        while($data = $articles->fetch())
        {
        ?>
            <div>
                <h2><a href="single.php?idArt=<?= htmlspecialchars($data['id']);?>"><?=htmlspecialchars($data['title']);?></a></h2>
                <p><?= htmlspecialchars($data['chapo']);?></p>
                <p><?= htmlspecialchars($data['author']);?></p>
                <p>Créé le : <?= htmlspecialchars($data['date_added']);?></p>
            </div>
        <br>
        <?php
        }
        $articles->closeCursor();
        ?>
    </div>
</body>
</html>