<?php 

$error = "ERROR\n";
if (!empty($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['passwd']) && $_POST['submit'] == "OK")
{
    if (!(file_exists('../private/passwd')))
    {
        mkdir('../private');
        $array = array();
        $array[] = [$_POST['login'], hash('whirlpool', $_POST['passwd'])];
        file_put_contents('private/passwd', serialize($array));
        echo "OK\n";
    }
    else
    {
        $liste = file_get_contents('../private/passwd');
        $liste = unserialize($liste);
        foreach($liste as $row)
        {
            if ($row[0] == $_POST['login'])
            {
                echo $error;
                return (0);
            }
        }
        $liste[] = [$_POST['login'], hash('whirlpool', $_POST['passwd'])];
        file_put_contents('../private/passwd', serialize($liste));
        echo "OK\n";
    }
}
else
{
    echo $error;
    return (0);
}
?>