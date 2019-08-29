<?php
$this->title = "User";
?>
<?php
session_start();
if (!isset($_SESSION['pseudo'])) {
	header ('Location: index.php'); //Mettre bon chemin de redirection si pas connecté =>home
	exit();
}

if(isset($_SESSION['add_comment'])) {
    echo '<p>'.$_SESSION['add_comment'].'<p>';
    unset($_SESSION['add_comment']);
}
?>

<h2>Bienvenue <?php echo htmlspecialchars(trim($_SESSION['login'])); ?> !<br />
<a href="deconnexion.php">Déconnexion</a></h2>

<a href="../public/index.php?route=addArticle">Ajouter un article</a> /
<a href="../public/index.php?route=allArticle">Voir tous les articles</a> /
<a href="../public/index.php?route=deconnexion">Se déconnecter</a>