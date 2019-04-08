<?php
session_start();

include('configs/database.php');
include('models/delaccount_model.php');

if (isset($_POST['pwd']))
{
    $pass = htmlspecialchars(addslashes($_POST['pwd']));
    if (check_login($mysqli, $_SESSION['email'], $pass) == TRUE)
    {
        deluser($mysqli, $_SESSION['email']);
        header('Location: logout.php');
    }
}
?>