<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Accueil";
?>
<?php

if(isset($_SESSION['inscription'])) {
    echo '<p>'.$_SESSION['inscription'].'<p>';
    unset($_SESSION['inscription']);
}
if(isset($_SESSION['login']) && $_SESSION['droit'] == 'admin') { 
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allUsers">Tous les membres</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=addArticle">Déposer un article</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    
}
if(isset($_SESSION['login']) && $_SESSION['droit'] == 'user') {
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<p>Bonjour '.$_SESSION['pseudo'].'<p>';
    echo '<p>'.$_SESSION['login'].'<p>';
}
if(!isset($_SESSION['login'])) {
    echo '<button type="button"><a href="../public/index.php?route=login">Se connecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=inscription">S\'inscrire</button></a>';
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
}
?>
<div>
    <div>
        <div class="col-md-6 col-lg-6" style="text-align:center">
            <hr>
            <a href="../public/img/CV_ALEXIA_SEUROT.pdf" >Mon C.V. en PDF</a>
            <hr>
        </div>
    </div>
</div>
<div class="container">
<h2>Les derniers articles :</h2>
<?php
foreach ($articles as $article)
{
?>
<hr>
    <div class="col-md-3 col-lg-3" style="text-align:center">
    <img src="../public/img/logo.png">
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
