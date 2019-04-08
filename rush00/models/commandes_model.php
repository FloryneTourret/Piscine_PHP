<?php

function get_commandes($mysqli)
{
    $email = $_SESSION['email'];
    $result = mysqli_query($mysqli, "SELECT * FROM `commandes` INNER JOIN `users` ON users.id = commandes.user_id WHERE `email` = '$email' ORDER BY `date_commande` DESC");
    return (mysqli_fetch_all($result));
}

?>