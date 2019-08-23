<?php
session_start();
?>
<?php
$this->title = "Acceuil";
?>
<?php
//SESSION AJOUT Article (a basculer dans systeme admin)
if(isset($_SESSION['add_article'])) {
    echo '<p>'.$_SESSION['add_article'].'<p>';
    unset($_SESSION['add_article']);
}
?>
<form action="../public/index.php?route=login" method="POST">
<h3>Entrez vos informations de connexion</h3>

<label>Pseudo</label>
<input type="text" placeholder="Entrez votre pseudo" name="pseudo" required>

<label>Mot de passe</label>
<input type="password" placeholder="Entrez votre mot de passe" name="password" required>

<input type="submit" id="submit" value="LOGIN">
<?php
if(isset($_GET['error'])){
    $err = $_GET['error'];
    if($err==1 || $err==2)
    echo "<p style='color:red'>Utilisateur ou mot de passe non valide</p>";
}
?> 
<?php
foreach ($articles as $article)
{
?>
    <article>
        <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getChapo());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
    </article>
<br>
<?php
}
?>
