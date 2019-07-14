<?php
//on inclut le fichier dont on a besoin
require '../src/DAO/DAO.php';
require '../src/DAO/ArticleDAO.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf8">
    <title>Blog en PHP</title>
</head>
    
<body>
    <div>
        <h1>Blog en PHP</h1>
        <p>En construction</p>
        <?php
        $article = new ArticleDAO();
        $articles = $article->getArticles();
        while($data = $articles->fetch())
        {
        ?>
            <div>
                <h2><a href="single.php?idArt=<?= htmlspecialchars($data['id']);?>"><?= htmlspecialchars($data['title']);?></a></h2>
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