<?php
session_start();
if(isset($_POST['mail']) && isset($_POST['password']))
{
    $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($mail !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM user where 
              mail = '".$mail."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: index.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // addresse e-mail ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // addresse e-mail ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>
}