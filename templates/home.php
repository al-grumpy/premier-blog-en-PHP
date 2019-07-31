<?php
session_start();
?>
<?php
$this->title = "Acceuil";
?>
<h1>Blog en PHP</h1>
<p>En construction</p>
<a href="../public/index.php?route=login">Se connecter</a>
<?php
if(isset($_SESSION['add_article'])) {
    echo '<p>'.$_SESSION['add_article'].'<p>';
    unset($_SESSION['add_article']);
}
?>
<a href="../public/index.php?route=addArticle">Ajouter un article</a>
<?php
foreach ($articles as $article)
{
?>
    <div>
        <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getChapo());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </div>
<br>
<?php
}
?>
