<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Gestion article";
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
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<p>'.$_SESSION['login'].'<p>';
}
if(!isset($_SESSION['login'])) {
    echo '<button type="button"><a href="../public/index.php?route=login">Se connecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=inscription">S\'inscrire</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
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
    <button type="button"><a href="../public/index.php?route=deleteArticle&idArt=<?= htmlspecialchars($article->getId());?>">Supprimer l'article</button></a>
    </div>
</div>
<br>
<br>
<a href="../public/index.php">Retour à l'accueil</a>

<div id="comments" class="text-center" style="margin-left: 50px">
<hr>
    <h3>Commentaires validés :</h3>
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
    </div>

<div id="comments" class="text-center" style="margin-left: 50px">
<hr>
    <h3>Commentaires en attende de validation :</h3>
    <?php
    foreach ($commentsWaiting as $comment)
    {
    ?>
    <hr>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        <form method="post" action="../public/index.php?route=updateComment&idCom=<?= htmlspecialchars($comment->getId());?>">
            <input type="submit" value="Confirmer" id="submit_confirme" name="submit_confirme">
        </form>
        <form method="post" action="../public/index.php?route=updateComment&idCom=<?= htmlspecialchars($comment->getId());?>">
            <input type="submit" value="Refuser" id="submit_refuse" name="submit_refuse">
        </form>
        <?php
    }
    ?>
    </div>


<div class="contain">
    <div class="row">
    <hr>
    <h3>Modifier l'article</h3>
    <hr>
       <div class="col-xs-6" style="text-align:center">
           <form method="post" action="../public/index.php?route=updateArticle">
        <label type="title"><b>Titre actuel :</b> <?= htmlspecialchars($article->getTitle());?></label><br>
        <textarea id="majTitle" name="majTitle" cols="40" value="<?php
            if(isset($post['majTitle'])){  
                echo $post['majTitle'];}
        ?>">
        </textarea>
        <br>
        <br>
        <label for="chapo"><b>Chapo actuel :</b> <?= htmlspecialchars($article->getChapo());?></label><br>
        <textarea id="majChapo" name="majChapo" rows="3" cols="40" value="><?php 
            if(isset($post['majChapo'])){
                echo $post['majChapo'];}
        ?>">
        </textarea>
        <br>
        <br>
        <label for="content"><b>Contenu actuel :</b> <?= htmlspecialchars($article->getContent());?></label><br>
        <textarea id="majContent" name="majContent" rows="5" cols="40" value="><?php 
            if(isset($post['majContent'])){
                echo $post['majContent'];}
        ?>">
        </textarea>
        <br>
        <input type="hidden" name="article_id" id="article_id" value="<?php htmlspecialchars($_GET['idArt']) ?>" >
        <input type="submit" value="Modifier article" id="majArticle" name="majArticle">
        <br>
        <br>
    </form>
       </div>
    <hr>
    </div>
</div>

