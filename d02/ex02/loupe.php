#!/usr/bin/php
<?php
    if ($argc === 1 || !file_exists($argv[1]))
        return  (1);

    $file = file_get_contents($argv[1]);

    function check3($match)
    {
        return (">" . strtoupper($match[1]) . "<");
    }

    function check2($match)
    {
        return ("title=\"" . strtoupper($match[1]) . "\"");
    }

    function check($match)
    {
        $ret = preg_replace_callback('/title="(.*)"/Uis', check2, $match[0]);
        $ret1 = preg_replace_callback('/>(.*)</Uis', check3, $ret);
        return ($ret1);
    }

    $ret = preg_replace_callback('/<a(.*)<\/a/Uis', check, $file);
    echo $ret;
?>%