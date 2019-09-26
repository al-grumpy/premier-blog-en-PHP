<?php
$this->title = "Profil utilisateur";
?>


<div class="contain">
    <div class="row">
    <hr>
       <div class="col-xs-6" style="text-align:center">
           <p>Ref Id : <?= htmlspecialchars($user->getId());?></p>
           <h3 style="color:#2C2C45">Pseudo : <?= htmlspecialchars($user->getPseudo());?></h3>
           <p>Adresse mail : <?= htmlspecialchars($user->getMail());?></p>
           <p>Inscrit le : <?= htmlspecialchars($user->getDateInscription());?></p>
       </div>
    <hr>
    </div>
</div>
<br>
<h4>Supprimer utilisateur</h4>
<form method="post" action="../public/index.php?route=deleteUser">
        <label type="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?php
            if(isset($post['pseudo'])){  //Penser à mettre des contraintes dans input form
                echo $post['pseudo'];}
        ?>"><br>
        <input type="submit" value="Supprimer" id="submit" name="submit_delete">
</form>
    <hr>
</div>
