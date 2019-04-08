<?php
session_start();
header('Access-Control-Allow-Origin: *');

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
include('../models/admin/articles_model.php');

include('../views/base/header_admin.php');
include('../views/base/sidebar.php');
$articles = get_articles($mysqli);
include('../views/admin/articles_view.php');

if(isset($_GET['del']))
{
    if(is_numeric($_GET['del']))
    {
        $id = $_GET['del'];
        suppression_article($mysqli, $id);
    }
}
if(isset($_GET['update']))
{
    if(isset($_GET['desc']))
    {
        if(is_numeric($_GET['update']))
        {
            $id = $_GET['update'];
            $desc = ucfirst(htmlspecialchars(addslashes($_GET['desc'])));

            $caracteres = array('À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
            'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', '€' => 'e',
            'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
            'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
            'Œ' => 'oe', 'œ' => 'oe',
            '$' => 's');
            
            $desc = strtr($desc, $caracteres);
            $desc = preg_replace('#[^A-Za-z0-9]+#', ' ', $desc);
            $desc = trim($desc);
            update_desc_article($mysqli, $id, $desc);
        }
    }
    if(isset($_GET['titre']))
    {
        if(is_numeric($_GET['update']))
        {
            $id = $_GET['update'];
            $titre = ucfirst(htmlspecialchars(addslashes($_GET['titre'])));

            $caracteres = array('À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
            'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', '€' => 'e',
            'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
            'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
            'Œ' => 'oe', 'œ' => 'oe',
            '$' => 's');
            
            $titre = strtr($titre, $caracteres);
            $titre = preg_replace('#[^A-Za-z0-9]+#', ' ', $titre);
            $titre = trim($titre);

            update_titre_article($mysqli, $id, $titre);
        }
    }
    if(isset($_GET['prix']))
    {
        if(is_numeric($_GET['update']) && is_numeric($_GET['prix']))
        {
            $id = $_GET['update'];
            $prix = $_GET['prix'];
            update_prix_article($mysqli, $id, $prix);
        }
    }
}

include('../views/base/footer_admin.php');
?>