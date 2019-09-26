<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Tous les membres";
?>
<?php

if(isset($_SESSION['login'])) {
    echo '<p>'.$_SESSION['login'].'<p>';
    unset($_SESSION['login']);
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
