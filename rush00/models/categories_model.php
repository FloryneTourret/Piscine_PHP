<?php 

function get_categories($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `categories`");
    $categories = mysqli_fetch_all($result);
    if (isset($categories))
            return $categories;
    return FALSE;
}

function get_articles($mysqli, $id)
{
    $result = mysqli_query($mysqli, "SELECT `article_id`, `titre`, `description`, `prix` FROM `articles` INNER JOIN `article_categorie` ON articles.id = article_categorie.article_id INNER JOIN `categories` ON article_categorie.categorie_id = categories.id WHERE categories.id = $id");
    $articles = mysqli_fetch_all($result);
    if (isset($articles))
            return $articles;
    return FALSE;
}

function get_actual($mysqli, $id)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `categories` WHERE id = $id");
    $actual = mysqli_fetch_array($result);
    if (isset($actual))
            return $actual;
    return FALSE;
}

?>