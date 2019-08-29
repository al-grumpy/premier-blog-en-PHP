<?php
$this->title = "Article";
?>

<h1>Blog en PHP</h1>
<p>En construction</p>
<div class="contain">
    <div class="row">
       <div class="col-xs-6">
           <h2 style="color:#2C2C45"><?= htmlspecialchars($article->getTitle());?></h2>
           <p><?= htmlspecialchars($article->getContent());?></p>
           <p><?= htmlspecialchars($article->getAuthor());?></p>
           <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
       </div>
    </div>
</div>
<br>
<a href="../public/index.php">Retour à la liste des articles</a>
<div id="comments" class="text-left" style="margin-left: 50px">
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
<h4>Ajouter un commentaire :</h4>
    <div>
        <form method="post" action="../public/index.php?route=addComment"> 
            <label type="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" required value="<?php
                if(isset($post['pseudo'])){  //Penser à mettre des contraintes dans input form et verif route addComment...
                    echo $post['pseudo'];}
            ?>"><br>
            <label for="content">Message</label><br>
            <textarea id="content" name="content" row="5" required value="<?php 
                if(isset($post['content'])){
                    echo $post['content'];}
            ?>">
            </textarea><br>
            <input type="hidden" name="article_id" id="article_id" value="<?= htmlspecialchars($article->getId());?>" >
            <input type="submit" value="Envoyer" id="submit" name="submit">
        </form>
    </div>