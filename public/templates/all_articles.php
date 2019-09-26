<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Tous les articles";
?>
<?php

if(isset($_SESSION['inscription'])) {
    echo '<p>'.$_SESSION['inscription'].'<p>';
    unset($_SESSION['inscription']);
}
if(isset($_SESSION['login'])) {
    echo '<p>'.$_SESSION['login'].'<p>';
    unset($_SESSION['login']);
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
