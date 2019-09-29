<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
$this->title = "Profil utilisateur";
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
<div class="contain">
    <div class="row">
    <hr>
       <div class="col-xs-6" style="text-align:center">
           <p>Ref Id : <?= htmlspecialchars($user->getId());?></p>
           <p>>Droit : <?= htmlspecialchars($user->getDroit());?></p>
           <h3 style="color:#2C2C45">Pseudo : <?= htmlspecialchars($user->getPseudo());?></h3>
           <p>Adresse mail : <?= htmlspecialchars($user->getMail());?></p>
           <p>Inscrit le : <?= htmlspecialchars($user->getDateInscription());?></p>
       </div>
    <hr>
    </div>
</div>
<br>
</div>
<a href="../public/index.php?route=allUsers">Retour aux membres</a>
