<?php 
session_start();
if (!isset($_SESSION['email']))
{
    header('Location: login.php');
}

include('configs/database.php');
include('models/acheter_model.php');

if (isset($_SESSION['panier']))
{
    $array = json_decode($_SESSION['panier']);
    $temp = get_article($mysqli, $_GET['id']);
    $present = 0;
    $id = 0;
    foreach ($array as $row)
    {
        if ($row->id == $_GET['id'] && $present == 0)
        {
            $array[$id]->quantite += 1;
            $present = 1;
        }
        $id++;
    }
    if ($present == 0)
    {
        $temp['quantite'] = 1;
        $array[] = $temp;
    }
    $_SESSION['panier'] = json_encode($array);
}
else
{
    $array = array();
    $temp = get_article($mysqli, $_GET['id']);
    $temp['quantite'] = 1;
    if ($temp != FALSE)
        $array[] = $temp;
    $_SESSION['panier'] = json_encode($array);
}
?>