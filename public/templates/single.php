<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Article";
?>
<?php
if(isset($_SESSION['add_comment'])) {
    echo '<p>'.$_SESSION['add_comment'].'<p>';
    unset($_SESSION['add_comment']);
}
if(isset($_SESSION['flash']) && !isset($_SESSION['pseudo'])) {
    echo '<p>'.$_SESSION['flash'].'<p>';
    unset($_SESSION['flash']);
}
if(isset($_SESSION['login']) && $_SESSION['droit'] == 'user') {
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
    echo '<p>'.$_SESSION['login'].'<p>';
}
if(!isset($_SESSION['login'])) {
    echo '<button type="button"><a href="../public/index.php?route=login">Se connecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=inscription">S\'inscrire</button></a>';
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
}

?>

<div class="contain">
    <div class="row" style="background-color:grey">
    <hr>
       <div class="row">
       <div class="col-lg-6" style="text-align:center">
           <h2 style="color:#2C2C45"><?= htmlspecialchars($article->getTitle());?></h2>
           <p><?= htmlspecialchars($article->getContent());?></p>
           <p>Auteur : <?= htmlspecialchars($article->getAuthor());?></p>
           <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
       </div>
       </div>


    <hr>

    </div>
</div>
<br>
<br>


    <hr>
    </div>
</div>

<div id="comments" class="text-center" style="margin-left: 50px">
    <h3>Commentaires :</h3>
    <?php
    foreach ($comments as $comment)
    {
    ?>
    <hr>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        <?php
    }
    ?>
    <hr>
</div>

<div class="caption">
<h2>Ajouter un commentaire :</h2>
    <div class="caption">
        <form method="post" action="../public/index.php?route=addComment" style="border">
            <label for="pseudo">* Votre pseudo sera posté automatiquement</label>
            <br>
            <br>
            <input type="hidden" name="pseudo" id="pseudo" value="<?= htmlspecialchars($_SESSION['pseudo']);?>" >
            <label for="content">Entrez votre commentaire :</label><br>
            <textarea id="content" name="content" rows="5" cols="40" required value="<?php 
                if(isset($post['content'])){
                    echo $post['content'];}
            ?>">
            </textarea><br>
            <input type="hidden" name="article_id" id="article_id" value="<?= htmlspecialchars($article->getId());?>" >
            <input type="submit" value="Envoyer" id="submit_comment" name="submit_comment">
        </form>
</div>

    </div>
