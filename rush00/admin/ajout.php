<?php
session_start();

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
include('../models/admin/ajout_model.php');
include('../models/admin/categories_model.php');

include('../views/base/header_admin.php');
include('../views/base/sidebar.php');
$categories = get_categories($mysqli);
include('../views/admin/ajout_view.php');

if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['prix']))
{
    
    $caracteres = array('À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
    'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', '€' => 'e',
    'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
    'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
    'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
    'Œ' => 'oe', 'œ' => 'oe',
    '$' => 's');

    $titre = ucfirst(htmlspecialchars(addslashes($_POST['titre'])));
    
    $titre = strtr($titre, $caracteres);
	$titre = preg_replace('#[^A-Za-z0-9]+#', ' ', $titre);
    $titre = trim($titre);

    $description = htmlspecialchars(addslashes($_POST['description']));

    $description = strtr($description, $caracteres);
	$description = preg_replace('#[^A-Za-z0-9]+#', ' ', $description);
    $description = trim($description);

    $prix = strtolower(htmlspecialchars(addslashes($_POST['prix'])));
    if (is_numeric($prix))
    {
        $id_article = ajout_article($mysqli, $titre, $description, $prix);
        if(isset($_POST['categories']))
        {
            ajout_article_categorie($mysqli, $id_article, $_POST['categories']);
        }
        header('Location: articles.php');
    }
    else
        echo '<div class="text-center"><p>Entrez un nombre pour le prix.</p></div>';
}


include('../views/base/footer_admin.php');
?>