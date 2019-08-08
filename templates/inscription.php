<?php
$this->title = "Inscription";
?>
<div>
   <form action="" method="post">
        <h1>Inscription</h1>
        
        <label>Adresse e-mail</label>
        <input type="mail" name="mail" required>

        <label>Pseudo</label>
        <input type="text" name="text" required>
        
        <label>Mot de passe</label>
        <input type="password" name="password" required>

        <label>Confirmation du mot de passe</label>
        <input type="password" name="password" required>
        
        <input type="submit" id='submit' value='INSCRIPTION' >
    </form>
</div>