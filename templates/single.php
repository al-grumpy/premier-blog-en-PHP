<?php
$this->title = "Article";
?>
<?php
session_start();
?>
<h1>Blog en PHP</h1>
<p>En construction</p>

<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
</div>
<br>
<a href="../public/index.php">Retour à la liste des articles</a>
<div id="comments" class="text-left" style="margin-left: 50px">
<?php
if(isset($_SESSION['add_comment'])) {
    echo '<p>'.$_SESSION['add_comment'].'<p>';
    unset($_SESSION['add_comment']);
}
?>
    <p><a href="../templates/add_comment.php">Ajouter un commentaire</a></p>
    <h3>Commentaires :</h3>
    <?php
    foreach ($comments as $comment)
    {
    ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        <?php
    }
    ?>
</div>
