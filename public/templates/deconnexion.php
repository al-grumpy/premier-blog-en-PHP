<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php'); //Mettre bon chemin de redirection pour deconnecter
exit();
?>