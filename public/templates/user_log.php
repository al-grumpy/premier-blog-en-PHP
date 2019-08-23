<?php
$this->title = "Utilisateur connecté";
?>
<?php
session_start();

if($_SESSION['pseudo'] !== ""){
    $peudo = $_SESSION['pseudo'];
    echo "Bonjour $pseudo, vous êtes connecté";
}

if(isset($_SESSION['add_comment'])) {
    echo '<p>'.$_SESSION['add_comment'].'<p>';
    unset($_SESSION['add_comment']);
}
?>

<a href="../public/index.php?route=addArticle">Ajouter un article</a> /
<a href="../public/index.php?route=allArticle">Voir tous les articles</a> /
<a href="../public/index.php?route=deconnexion">Se déconnecter</a> 