#!/usr/bin/php
<?php
    /* Set de la timezone si non définie */
    if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('Europe/Paris');
    }

    /* Ouverture du fichier utmpx en readonly */
    $file = fopen("/var/run/utmpx", "r");
    /* Lecture du fichier en mode binaire */
    while ($utmpx = fread($file, 628))
    {
        $struct = unpack("a256user/a4id/a32line/ipid/itype/I2time", $utmpx);
        if ($struct["type"] == 7)
            echo $struct["user"] . " " . $struct["line"] . "  " . date("M j H:i", $struct["time1"]) . "\n";
     }
?>