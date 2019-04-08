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
            $array[$id]->quantite = 0;
        $id++;
    }
    $_SESSION['panier'] = json_encode($array);
}
?>