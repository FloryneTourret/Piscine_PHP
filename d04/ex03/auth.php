<?php

function auth($login, $passwd)
{
    if (@file_get_contents('../private/passwd'))
    {
        $liste = file_get_contents('../private/passwd');
        $liste = unserialize($liste);
        
        $i = 0;
        foreach($liste as $row)
        {
            if ($row[0] == $login)
            {
                if (hash('whirlpool', $passwd) == $row[1])
                {
                    return TRUE;
                }
                else
                    return FALSE; 
            }
            $i++;
        }
        return FALSE;        
    }
    else
        return FALSE;
}

?>