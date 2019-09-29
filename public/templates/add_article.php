<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Ajouter un article";
?>
<?php

if(isset($_SESSION['login']) && $_SESSION['droit'] === 'admin') { 
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=addArticle">Déposer un article</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    
}
else{
    header('Location: ../public/index.php');
}
?>
<div class="contain">
    <div class="row">
    <hr>
       <div class="col-xs-6" style="text-align:center">
           <form method="post" action="../public/index.php?route=addArticle">
        <label type="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?php
            if(isset($post['title'])){  //Penser à mettre des contraintes dans input form
                echo $post['title'];}
        ?>"><br>
        <label for="chapo">Chapo</label><br>
        <textarea id="chapo" name="chapo" value="><?php 
            if(isset($post['chapo'])){
                echo $post['chapo'];}
        ?>">
        </textarea><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content" value="><?php 
            if(isset($post['content'])){
                echo $post['contenu'];}
        ?>">
        </textarea><br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author" value="<?php
            if(isset($post['author'])){
                echo $post['author'];} 
        ?>"><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
       </div>
    <hr>
    </div>
</div>
<div>
    
    <a href="../public/index.php">Retour à l'accueil</a>
</div>