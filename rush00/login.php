<?php

session_start();
if (isset($_SESSION['email']))
{
    header('Location: index.php');
}

include('configs/database.php');
include('models/login_model.php');

include('views/base/header.php');
include('views/login_view.php');

if(isset($_POST['email']) && isset($_POST['password']))
{

    $email = strtolower(htmlspecialchars(addslashes($_POST['email'])));
    $password = htmlspecialchars(addslashes($_POST['password']));
    if(check_login($mysqli, $email, $password ))
    {
        $_SESSION['email'] = $email;
        header('Location: index.php');
    }
    else
    {
        echo '<div class="text-center"><p>Identifiants incorrects.</p></div>';   
    }
}

include('views/base/footer.php');
?>