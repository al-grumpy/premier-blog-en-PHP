<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Me contacter";
?>
<?php

if(isset($_SESSION['login']) && $_SESSION['droit'] == 'admin') { 
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allUsers">Tous les membres</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=addArticle">Déposer un article</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
    
}
if(isset($_SESSION['login']) && $_SESSION['droit'] == 'user') {
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
    echo '<p>'.$_SESSION['login'].'<p>';
}
if(!isset($_SESSION['login'])) {
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';;
}
if(isset($_SESSION['update_article'])) {
    echo '<p>'.$_SESSION['update_article'].'<p>';
    unset($_SESSION['update_article']);
}
?>
<br>
<br>

<form action="" method="post" >

<fieldset>
 <legend> Me contacter : </legend>
   <p>Etes-vous déja membre ? : </p>
     <input type="radio" name="membre" value="oui" id="oui"/>
     <label for="oui" class="inline">oui</label>
     <input type="radio" name="CSS" value="non" id="non" />
     <label for="non" class="inline">non</label>
</fieldset>

<fieldset>
 <legend>Vos coordonnées :</legend>
  <label for="email">Votre email :</label>
   <input type="email" name="email" size="20" 
   maxlength="40" id="email" />

   <label for="email">Votre nom :</label>
   <input type="nom" name="nom" size="20" 
   maxlength="40" id="nom" />

   <label for="prenom">Votre prénom :</label>
   <input type="prenom" name="prenom" size="20" 
   maxlength="40" id="prenom" /><br><br>

  <label for="comments">Votre message :</label>
   <textarea name="comments" id="comments" cols="100" rows="5">
   </textarea>
</fieldset>

 <p>
 <input type="submit" value="Envoyer" />
 <input type="reset" value="Annuler" />
 </p>

</form>
