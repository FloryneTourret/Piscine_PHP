<?php

function register_user($mysqli, $firstname, $lastname, $email, $password_hash)
{
    mysqli_query($mysqli, "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname', '$lastname', '$email', '$password_hash')");
}

function email_exist($mysqli, $email)
{
    $result = mysqli_query($mysqli, "SELECT `email` FROM `users` WHERE `email` = '$email'");
    if (mysqli_num_rows($result) > 0)
        return TRUE;
    else
        return FALSE;
}

?>