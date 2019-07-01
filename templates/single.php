<?php
//appel des fichiers utiles à la page single
require 'Database.php';
require 'Article.php';
require 'Comment.php'
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
        <?php //penser à modifier class comment_article dans css pour affichage comments
        
        $articles->closeCursor();
        ?>
        <a href="home.php">Retour à la page accueil</a> 
        <div id="comments" class="comment_article">
            <h3>Commentaires</h3>
            <?php
            $comment = new Comment();
            $comments = $comment->getCommentsFromArticle($_GET['idArt']);
            while($datas = $comments->fetch())
            {
                ?>
                <h4><?= htmlspecialchars($datas['pseudo']);?></h4>
                <p><?= hhtmlspecialchars($datas['content']);?></p>
                <p>Posté le <?= htmlspecialchars($datas['date_added']);?></p>
                <?php
            }
            $comments->closeCursor();
            ?>
        </div>
    </div>
</body>
</html>