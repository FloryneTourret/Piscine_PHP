#!/usr/bin/php
<?php

if ($argc > 2)
{
    $i = 2;
    $key = $argv[1];
    while ($argv[$i])
    {
        $array[] = explode(":", $argv[$i]);
        $i++;
    }
    foreach($array as $row)
    {
        if ($row[0] == $key)
        {
            if (count($row) == 2)
                $res = $row[1];
        }
    }
    if ($res)
        echo $res."\n";
}

?>