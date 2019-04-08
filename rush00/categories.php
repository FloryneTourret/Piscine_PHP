<?php
session_start();

include('configs/database.php');
include('models/categories_model.php');

include('views/base/header.php');
$categories = get_categories($mysqli);
if (isset($_GET['categorie']))
{
    if (is_numeric($_GET['categorie']))
        $actual = get_actual($mysqli, $_GET['categorie']);
}
if (isset($_GET['categorie']))
{
    $categorie = $_GET['categorie'];
    if (is_numeric($categorie))
        $articles = get_articles($mysqli, $categorie);
    else
        $articles = NULL;
}
include('views/categories_view.php');

include('views/base/footer.php');
?>