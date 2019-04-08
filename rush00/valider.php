<?php
session_start();

if(!isset($_SESSION['email']))
    header('Location: login.php');
else
{
    include('configs/database.php');
    include('models/valider_model.php');
    valider_commande($mysqli);
    $_SESSION['panier'] = NULL;
    header('Location: commandes.php');
}

?>