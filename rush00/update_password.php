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
    if (isset($_POST['oldpwd']) && isset($_POST['newpwd']) && isset($_POST['newpwdr']))
    {
        if ($_POST['newpwd'] == $_POST['newpwdr'])
        {
            $oldpass = htmlspecialchars(addslashes($_POST['oldpwd']));
            $pass = password_hash(htmlspecialchars(addslashes($_POST['newpwd'])), PASSWORD_DEFAULT);
            if (check_login($mysqli, $_SESSION['email'], $oldpass) == TRUE)
            {
                $_SESSION['message'] = "Votre mot de passe a été modifié avec succès !";
                update_password($mysqli, $_SESSION['email'], $pass);
                header('Location: profil.php');
            }
            else
            {
                $_SESSION['message-error'] = "Votre ancien mot de passe ne correspond pas";
                header('Location: profil.php');
            }
        }
        else{
            $_SESSION['message-error'] = "Les mots de passe ne correspondent pas";
            header('Location: profil.php');
        }
    }
}
?>