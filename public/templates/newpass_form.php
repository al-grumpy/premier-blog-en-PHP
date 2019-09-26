<?php
session_start();
?>
<?php
//$this->title = "login";
?>
<h1>Demande de réinitialisation de mot de passe</h1>
<form method="post" action="../index.php?route=forgetPass">
        <label type="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?php
            if(isset($post['pseudo'])){  //Penser à mettre des contraintes dans input form
                echo $post['pseudo'];}
        ?>"><br>
        <label for="mail">Email</label><br>
        <input type="email" id="mail" name="mail" value="<?php
            if(isset($post['mail'])){  //Penser à mettre des contraintes dans input form
                echo $post['mail'];}
        ?>"><br>
        <input type="submit" value="Envoyer" id="submit" name="submit_forget_pass">
</form>
<?php if (isset($error)) { echo $error; } ?>
<a href="../index.php">Retour à l'accueil</a>