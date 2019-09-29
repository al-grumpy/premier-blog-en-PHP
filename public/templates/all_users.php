<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Tous les membres";
?>
<?php

if(isset($_SESSION['login']) && $_SESSION['droit'] === 'admin') { 
    echo '<button type="button"><a href="../public/index.php?route=logout">Se déconnecter</button></a>';
    echo '<button type="button"><a href="../public/index.php">Retour accueil</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=addArticle">Déposer un article</button></a>';
    echo '<button type="button"><a href="../public/index.php?route=allArticles">Tous les articles</button></a>';
    
}
else{
    header('Location: ../public/index.php');
}
?>
<div class="container">
<h2>Tous les membres :</h2>
<?php
foreach ($users as $user)
{
?>
<hr>
    <div class="col-md-3 col-lg-3" style="text-align:center">
    <article>
    <h3><a href="../public/index.php?route=user&idUser=<?= htmlspecialchars($user->getId());?>"><?= htmlspecialchars($user->getPseudo());?></a></h3>
        <p>>Numéro Id : <?= htmlspecialchars($user->getId());?></p>
        <p>>Pseudo : <?= htmlspecialchars($user->getPseudo());?></p>
        <p>>Adresse mail : <?= htmlspecialchars($user->getMail());?></p>
        <p>>Droit : <?= htmlspecialchars($user->getDroit());?></p>
        <p>>inscrit depuis : <?= htmlspecialchars($user->getDateInscription());?></p>
    </article>
    </div>
<hr>
<br>
<?php
}
?>
</div>

<a href="../public/index.php">Retour accueil</a>
