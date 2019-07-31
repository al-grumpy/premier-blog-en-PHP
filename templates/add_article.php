<?php
$this->title = "Ajouter un article";
?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
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
        <label for="content">Contennu</label><br>
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
    <a href="../public/index.php">Retour à l'accueil</a>
</div>