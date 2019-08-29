<?php
session_start();
?>
<?php
$this->title = "Acceuil";
?>
<?php
//SESSION AJOUT Article (a basculer dans systeme admin)
if(isset($_SESSION['add_article'])) {
    echo '<p>'.$_SESSION['add_article'].'<p>';
    unset($_SESSION['add_article']);
}
if(isset($_SESSION['inscription'])) {
    echo '<p>'.$_SESSION['inscription'].'<p>';
    unset($_SESSION['inscription']);
}
?>
<button type="button"><a href="../public/templates/login.php">Se connecter</button>

<h2><a href="../public/index.php?route=inscription">Se créer un compte utilisateur</a></h2>

<?php
foreach ($articles as $article)
{
?>
<hr>
    <article>
        <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getChapo());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </article>
<hr>
<br>
<?php
}
?>
