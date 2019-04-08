<?php

function get_commandes($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `commandes` INNER JOIN `users` ON users.id = commandes.user_id ORDER BY `date_commande` DESC");
    return (mysqli_fetch_all($result));
}

?>