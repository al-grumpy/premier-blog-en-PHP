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
        
        while($data = $article->fetch())
        {
        ?>
            <div>
                <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($data['id']);?>"><?= htmlspecialchars($data['title']);?></a></h2>
                <p><?= htmlspecialchars($data['chapo']);?></p>
                <p><?= htmlspecialchars($data['author']);?></p>
                <p>Créé le : <?= htmlspecialchars($data['date_added']);?></p>
            </div>
<br>
        <?php
        }
        $article->closeCursor();
        ?>
    </div>
</body>
</html>