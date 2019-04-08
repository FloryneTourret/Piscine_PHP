<?php
session_start();

include('configs/database.php');
include('models/profil_model.php');

if (!isset($_SESSION['email']))
{
    header('Location: index.php');
}
else
{
    if (isset($_POST['pwdmail']) && isset($_POST['newmail']))
    {
        $pass = htmlspecialchars(addslashes($_POST['pwdmail']));
        $mail = htmlspecialchars(addslashes($_POST['newmail']));
        if (check_login($mysqli, $_SESSION['email'], $pass) == TRUE)
        {
            $_SESSION['mail-message'] = "Votre adresse e-mail a été modifié avec succès !";
            update_mail($mysqli, $_SESSION['email'], $mail);
            $_SESSION['email'] = $mail;
            header('Location: profil.php');
        }
        else
        {
            $_SESSION['mail-message-error'] = "Votre mot de passe est incorrect";
            header('Location: profil.php');
        }
    }
}
?>