<?php
$this->$title = "login";
?>

<h1>Blog en PHP</h1>
<p>En construction</p>
<div>
<form action="checkConnexion.php" method="POST">
<h3>Entrez vos informations de connexion</h3>

<label>Pseudo</label>
<input type="text" placeholder="Entrez votre pseudo" name="pseudo" required>

<label>Mot de passe</label>
<input type="text" placeholder="Entrez votre mot de passe" name="password" required>

<input type="submit" id="submit" value="LOGIN">
<?php
if(isset($_GET['error'])){
    $err = $_GET['error'];
    if($err==1 || $err==2)
    echo "<p style='color:red'>Utilisateur ou mot de passe non valide</p>";
}
?>
</div>
</form>