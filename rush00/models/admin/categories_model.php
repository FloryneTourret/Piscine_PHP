<?php

function ajout_categorie($mysqli, $categorie)
{
    mysqli_query($mysqli, "INSERT INTO `categories` (`categorie`) VALUES ('$categorie')");
}

function get_categories($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `categories`");
    return (mysqli_fetch_all($result));
}

function suppression_categorie($mysqli, $id)
{
    mysqli_query($mysqli, "DELETE FROM `categories` WHERE `id` = $id");
}

function update_categorie($mysqli, $id, $categorie)
{
    mysqli_query($mysqli, "UPDATE `categories` SET `categorie` = '$categorie' WHERE `id` = $id");
}

?>