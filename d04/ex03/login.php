<?php

include('auth.php');
session_start();

if (auth($_GET['login'], $_GET['passwd']) == FALSE)
{
    $_SESSION['loggued_on_user'] = "";
    echo "ERROR\n";
    return (0);
}
else
{
    $_SESSION['loggued_on_user'] = $_GET['login'];
    echo "OK\n";
    return (0);
}

?>