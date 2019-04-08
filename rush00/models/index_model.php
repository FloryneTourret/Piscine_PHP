<?php

function get_categories($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `categories`");
    $categories = mysqli_fetch_all($result);
    if (isset($categories))
            return $categories;
    return FALSE;
}

function get_articles($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `articles`");
    $articles = mysqli_fetch_all($result);
    if (isset($articles))
            return $articles;
    return FALSE;
}

function get_last_articles($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 12 ");
    $last5 = mysqli_fetch_all($result);
    if (isset($last5))
            return $last5;
    return FALSE;
}

?>