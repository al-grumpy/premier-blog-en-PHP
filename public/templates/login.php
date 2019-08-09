<?php
$this->$title = "login";
?>
<h1>Blog en PHP</h1>
<p>En construction</p>
<div>
    <form action="checkConnexion.php" method="post">
        <h1>Connexion</h1>
        
        <label>Adresse e-mail</label>
        <input type="mail" name="mail" required>
        
        <label>Mot de passe</label>
        <input type="password" name="password" required>
        
        <input type="submit" id='submit' value='LOGIN' >
        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Adresse e-mail ou mot de passe incorrect</p>";
        }
        ?>
    </form>
</div>