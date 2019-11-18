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
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<p>'.$_SESSION['login'].'<p>';
}
if(!isset($_SESSION['login'])) {
    echo '<button type="button"><a href="../public/index.php?route=login">Se connecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=inscription">S\'inscrire</button></a>';
    echo '<button type="button"><a href="mailto:alexiaseurot@gmail.com">Me contacter</a>';
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
           <p>Dernière mise à jour le : <?= htmlspecialchars($article->getDateMaj());?></p>
       </div>
       </div>
    <hr>

    </div>
</div>
<br>
<br>
<a href="../public/index.php">Retour à l'accueil</a>

<div class="contain">
    <div class="row">
    <hr>
    <h3>Modifier l'article</h3>
    <hr>
       <div class="col-xs-6" style="text-align:center">
           <form method="post" action="../public/index.php?route=updateArticle">
        <label type="title">Titre</label><br>
        <textarea id="majTitle" name="majTitle" cols="40" value="<?php
            if(isset($post['title'])){  
                echo $post['title'];}
        ?>">
        </textarea>
        <br>
        <br>
        <label for="chapo">Chapo</label><br>
        <textarea id="majChapo" name="majChapo" rows="3" cols="40" value="><?php 
            if(isset($post['chapo'])){
                echo $post['chapo'];}
        ?>">
        </textarea>
        <br>
        <br>
        <label for="content">Contenu</label><br>
        <textarea id="majContent" name="majContent" rows="5" cols="40" value="><?php 
            if(isset($post['content'])){
                echo $post['contenu'];}
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

<div id="comments" class="text-center" style="margin-left: 50px">
    <h3>Commentaires en attende de validation :</h3>
    <?php
    foreach ($comments as $comment)
    {
    ?>
    <hr>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        <form method="post" action="../public/index.php?route=checkComment">
            <input type="checkbox" value="1" id="valide" name="valide">Valider
            <input type="checkbox" value="0" id="refuse" name="refuse">Refuser
            <input type="hidden" name="comment_id" id="comment_id" value="<?= htmlspecialchars($comment->getId());?>" >
            <input type="hidden" name="article_id" id="article_id" value="<?= htmlspecialchars($comment->getArticleId());?>" >
            <input type="submit" value="Confirmer" id="submit_confirme" name="submit_confirme">
        </form>
        <?php
    }
    ?>
    </div>
