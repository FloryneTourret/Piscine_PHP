<?php

function get_utilisateurs($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `users`");
    return (mysqli_fetch_all($result));
}

function suppression_utilisateur($mysqli, $id)
{
    mysqli_query($mysqli, "DELETE FROM `users` WHERE `id` = $id");
}