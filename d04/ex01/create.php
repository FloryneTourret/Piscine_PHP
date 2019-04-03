<?php 

$i = 0;
$error = "ERROR\n";
if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['passwd']))
{
    if (!(file_exists('private/passwd')))
    {
        mkdir('private/passwd');
    }
    else
    {
        $liste = file_get_contents('private/passwd');
        serialize($liste);
        while($liste[$i])
        {
            if ($liste[$i] == $_POST['login'])
                return $error;
            $i++;
        }
        if ($i == count($liste))
        {
            $content = array();
            $content[0] = $_POST['login'];
            $content[1] = $_POST['passwd'];
            file_put_contents('private/passwd', $content);
        }
    }
}
else
    return ($error);
?>