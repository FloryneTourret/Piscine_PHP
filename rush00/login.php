<?php

session_start();
if (isset($_SESSION['email']))
{
    header('Location: index.php');
}

include('configs/database.php');
include('models/login_model.php');

include('views/base/header_connexion.php');
include('views/login_view.php');

if(isset($_POST['email']) && isset($_POST['password']))
{

    $email = strtolower(htmlspecialchars(addslashes($_POST['email'])));
    $password = htmlspecialchars(addslashes($_POST['password']));
    $user = check_login($mysqli, $email, $password);
    if($user != FALSE)
    {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['role'] = $user['role'];
        if ($_SESSION['role'] == 'admin')
            header('Location: admin/commandes.php');
        else
            header('Location: index.php');
    }
    else
    {
        echo '<div class="text-center"><p>Identifiants incorrects.</p></div>';   
    }
}

include('views/base/footer.php');
?>