<?php
$this->title = "Ajouter un commentaire";
?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form action="post" methode="../public/index.php?route=addComment">
        <label type="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?php
            if(isset($post['pseudo'])){  //Penser à mettre des contraintes dans input form
                echo $post['pseudo'];}
        ?>"><br>
        <label for="content">Message</label><br>
        <textarea id="content" name="content" value="><?php 
            if(isset($post['content'])){
                echo $post['content'];}
        ?>">
        </textarea><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>