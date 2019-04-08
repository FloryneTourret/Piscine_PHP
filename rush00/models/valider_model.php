<?php 

function valider_commande($mysqli)
{
    $panier = $_SESSION['panier'];
    $id = $_SESSION['id'];
    mysqli_query($mysqli, "INSERT INTO `commandes` (`user_id`, `commande`) VALUES ($id, '$panier')");
}
?>