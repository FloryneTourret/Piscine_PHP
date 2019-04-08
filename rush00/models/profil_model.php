<?php 

function update_password($mysqli, $mail, $pass)
{
    mysqli_query($mysqli, "UPDATE `users` SET `password` = '$pass' WHERE `email` = '$mail'");
}

function check_login($mysqli, $email, $password)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `email` = '$email'");
    $user = mysqli_fetch_array($result);
    if (isset($user))
        if (password_verify($password, $user['password']))
            return TRUE;
    return FALSE;
}

function update_mail($mysqli, $oldmail, $newmail)
{
    mysqli_query($mysqli, "UPDATE `users` SET `email`='$newmail' WHERE `email` ='$oldmail'");
}

?>