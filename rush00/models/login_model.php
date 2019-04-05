<?php

function check_login($mysqli, $email, $password)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `email` = '$email'");
    $user = mysqli_fetch_array($result);
    if (isset($user))
        if (password_verify($password, $user['password']))
            return $user;
    return FALSE;
}

?>