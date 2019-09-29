<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Tous les articles";
?>
<?php

if(isset($_SESSION['login']) && $_SESSION['droit'] == 'admin') { 
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allUsers">Tous les membres</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=addArticle">Déposer un article</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allComments">Tous les commentaires</button></a>';
    
}
if(isset($_SESSION['login']) && $_SESSION['droit'] == 'user') {
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';;
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<p>'.$_SESSION['login'].'<p>';
}
if(!isset($_SESSION['login'])) {
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=login">Se connecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=inscription">S\'inscrire</button></a>';
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
}
?>

<div class="container">
<h2>Tous les articles :</h2>
<?php
foreach ($articles as $article)
{
?>
<hr>
    <div class="col-md-3 col-lg-3" style="text-align:center">
    <article>
        <h3><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h3>
        <p><?= htmlspecialchars($article->getChapo());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </article>
    </div>
<hr>
<br>
<?php
}
?>
</div>

<a href="../public/index.php">Retour accueil</a>
