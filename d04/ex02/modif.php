<?php 
$error = "ERROR\n";
if (!empty($_POST['login']) && !empty($_POST['oldpw']) && !empty($_POST['newpw']) && $_POST['submit'] == "OK")
{
    if (@file_get_contents('../ex01/private/passwd'))
    {
        $liste = file_get_contents('../ex01/private/passwd');
        $liste = unserialize($liste);
        
        $i = 0;
        foreach($liste as $row)
        {
            if ($row[0] == $_POST['login'])
            {
                if (hash('whirlpool', $_POST['oldpw']) == $row[1])
                {
                    $liste[$i][1] = hash('whirlpool', $_POST['newpw']);
                    file_put_contents('../ex01/private/passwd', serialize($liste));
                    echo "OK\n";
                }
                else
                    echo $error;
                return (0); 
            }
            $i++;
        }
        echo $error;
        return (0);        
    }
    else
    {
        echo $error;
        return (0);
    }
}
else
{
    echo $error;
    return (0);
}
?>