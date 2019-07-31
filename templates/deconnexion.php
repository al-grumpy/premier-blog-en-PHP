<?php
$this->$title = "Se déconnecter";
?>
<h1>Blog en PHP</h1>
<p>En construction</p>
<div>
    <a href="session_user.php?deconnexion=true"><h2>Déconnexion</h2></a>

    <!-- on teste si l'utilisateur est connecté -->
    <?php
        session_start();
        if(isset($_GET['deconnexion']))
        {
            if($_GET['deconnexion']==true)
            {
                session_unset();
                header("location:login.php");
            }
        }
        else if($_SESSION['mail'] !== ""){
            $user = $_SESSION['mail'];
            //affiche un message de connexion
            echo "<br>Bonjour $user, vous êtes bien connectés";
        }
    ?>
</div>