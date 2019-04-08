<?php

function ajout_article($mysqli, $titre, $description, $prix)
{
    mysqli_query($mysqli, "INSERT INTO `articles`(`titre`, `description`, `prix`) VALUES ('$titre', '$description', '$prix')");
    return (mysqli_insert_id($mysqli));
}

function ajout_article_categorie($mysqli, $id_article, $categories)
{
    foreach ($categories as $categorie)
    {
        $categorie = $categorie[0];
        mysqli_query($mysqli, "INSERT INTO `article_categorie`(`article_id`, `categorie_id`) VALUES ('$id_article', '$categorie')");
    }
}

?>