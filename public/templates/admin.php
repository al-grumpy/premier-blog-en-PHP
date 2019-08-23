<?php
$this->title = "Admin";
?>
<?php
session_start();
?>
<div>
    <h1>Blog en PHP</h1>
    <p>En construction / Partie Admin</p>
    <img src="../public/img/wallpaper.jpg">
</div>

<div class="">
          
      </div>
<ul>
    <li>
        <a href="../public/index.php?route=addArticle">Ajouter un article</a>
    </li>
    <li>
        <a href="../public/index.php?route=validCom">Valider les commentaires en attentes</a>
    </li>
    <li>
        <a href="../public/index.php?route=?">Voir tous les articles</a>
    </li>
</ul>
<br>
<?php
foreach ($articles as $article)
{
?>
<hr>
    <div>
        <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getChapo());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </div>
<hr>

<br>
<?php
}
?>
