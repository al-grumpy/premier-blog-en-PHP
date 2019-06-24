<?php
require 'Database.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon premier blog en PHP</h1>
        <p>C'est vide, mais ça va venir!</p>
        <?php 
        
        $db = new Database();
        echo $db->getConnection();
        ?>
    </div>
</body>
</html>