<?php
$this->title = "Inscription";
?>
<div>
<h1>Inscription à l'espace membre :</h1><br/>

<?php if(!empty($errors)): ?>
<div>
   <p>Vous n'avez pas rempli le formulaire correctement</p>
   <ul>
       <?php foreach($errors as $error): ?>
           <li><?= $error; ?></li>
       <?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>

<div class="col-md-3 col-lg-3" style="text-align:center">
<form method="post" action="../public/index.php?route=inscription">
        <label type="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?php
            if(isset($post['pseudo'])){ 
                echo $post['pseudo'];}
        ?>"><br>
        <label for="pass">Mot de passe</label><br>
        <input type="password" id="pass" name="pass" value="<?php
            if(isset($post['pass'])){  
                echo $post['pass'];}
        ?>"><br>
        <label for="pass_confirm">Confirmation du mot de passe</label><br>
        <input type="password" id="pass_confirm" name="pass_confirm" value="<?php
            if(isset($post['pass_confirm'])){  
                echo $post['pass_confirm'];}
        ?>"><br>
        <label for="mail">Adresse mail</label><br>
        <input type="email" id="mail" name="mail" value="<?php
            if(isset($post['mail'])){
                echo $post['mail'];} 
        ?>"><br>
        <input type="hidden" name="droit" id="droit" value="user">
        <input type="submit" value="S'inscrire" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>