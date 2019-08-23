<?php
session_start();
if(isset($_POST['pseudo']) && isset($_POST['password']))
{
    $pseudo = mysqli_real_escape_string(htmlspecialchars($_POST['mail'])); 
    $password = mysqli_real_escape_string(htmlspecialchars($_POST['password']));
    
    if($pseudo !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM user where 
              pseudo = '".$pseudo."' and password = '".$password."' ";
        $exec_requete = mysqli_query($requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['pseudo'] = $pseudo;
           header('Location: ../public/index.php?route=user_log.php');
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
else{
   header('Location: login.php');
}
