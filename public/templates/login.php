<?php
session_start();
?>
<?php
//$this->title = "login";
?>
<h1>Se connecter</h1>
<form method="post" action="../public/index.php?route=login">
        <label type="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?php
            if(isset($post['pseudo'])){  //Penser à mettre des contraintes dans input form
                echo $post['pseudo'];}
        ?>"><br>
        <label for="pass">Mot de passe</label><br>
        <input type="password" id="pass" name="pass" value="<?php
            if(isset($post['pass'])){  //Penser à mettre des contraintes dans input form
                echo $post['pass'];}
        ?>"><br>
        <input type="submit" value="Se connecter" id="submit" name="submit_login">
</form>
<?php if (isset($error)) { echo $error; } ?>
<a href="../public/index.php">Retour à l'accueil</a>