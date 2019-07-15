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
        $data = $article->fetch();
        ?>
            <div>
                <h2><?= htmlspecialchars($data['title']);?></h2>
                <p><?= htmlspecialchars($data['content']);?></p>
                <p><?= htmlspecialchars($data['author']);?></p>
                <p>Créé le : <?= htmlspecialchars($data['date_added']);?></p>
            </div>
<br>
        <?php
        $article->closeCursor();
        ?>
        <a href="../public/index.php">Retour à la liste des articles</a>
        <div id="comments" class="text-left" style="margin-left: 50px">
            <h3>Commentaires :</h3>
            <?php
            while($datas = $comments->fetch())
            {
                ?>
                <h4><?= htmlspecialchars($datas['pseudo']);?></h4>
                <p><?= htmlspecialchars($datas['content']);?></p>
                <p>Posté le <?= htmlspecialchars($datas['date_added']);?></p>
                <?php
            }
            $comments->closeCursor();
            ?>
        </div>
    </div>
</body>
</html>