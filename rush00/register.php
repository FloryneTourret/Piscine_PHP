<?php
include('configs/database.php');
include('views/base/header.php');

include('views/register.php');

include('views/base/footer.php');

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_repeat']))
{
    if($_POST['password'] != $_POST['password_repeat'])
    {
        echo '<div class="text-center"><p>Les mots de passe ne correspondent pas.</p></div>';
    }
    else
    {
        //Faire les checks sur les infos envoyées + inscrire l'user
        header('Location: login.php');
    }
}
?>