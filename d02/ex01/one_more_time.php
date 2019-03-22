#!/usr/bin/php
<?php

function wrongformat()
{
    echo "Wrong Format\n";
    return (0);
}

$semaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$allmois = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
$pair = ['Avril', 'Juin', 'Septembre', 'Novembre'];
$impair = ['Janvier', 'Mars', 'Mai', 'Juillet', 'Aout', 'Octobre', 'Decembre'];

$array = explode(' ', $argv[1]);
if(count($array) == 5)
{
    $array2 = explode(':', $array[4]);
    if(count($array2 == 3))
    {
        if ($array2[0] >= 0 && $array2[0] < 24 && strlen($array2[0]) == 2)
            $heures = $array2[0];
        else
            wrongformat();
        if ($array2[1] >= 0 && $array2[1] < 60 && strlen($array2[1]) == 2)
            $minutes = $array2[1];
        else
            wrongformat();
        if ($array2[2] >= 0 && $array2[2] < 60 && strlen($array2[2]) == 2)
            $secondes = $array2[2];
        else
            wrongformat();
        if (!in_array(ucfirst($array[0]), $semaine))
            wrongformat();
        if (!in_array(ucfirst($array[2]), $allmois))
            wrongformat();
        else{
            $i = 0;
            while ($i < 12)
            {
                if (ucfirst($array[2]) == $allmois[$i])
                {
                    $mois = $i + 1;
                    break;
                }
                $i++;
            }
        }
        if(strlen($array[3]) == 4 && $array[3] >= 1970)
            $annees = $array[3];
        else
            wrongformat();
        if(strlen($array[1]) == 2 || strlen($array[1]) == 1)
        {
            if (in_array(ucfirst($array[2]), $pair))
            {
                if($array[1] > 0 && $array[1] <= 30)
                    $jours = $array[1];
                else
                    wrongformat();
            }
            else if (in_array(ucfirst($array[2]), $impair))
            {
                if($array[1] > 0 && $array[1] <= 31)
                    $jours = $array[1];
                else
                    wrongformat();
            }
            else if (ucfirst($array[2]) == 'Fevrier')
            {
                if($array[3] % 4 == 0)
                {
                    if($array[1] > 0 && $array[1] <= 29)
                        $jours = $array[1];
                    else
                        wrongformat();
                }
                else
                {
                    if($array[1] > 0 && $array[1] <= 28)
                        $jours = $array[1];
                    else
                        wrongformat();
                }
            }
            else
                wrongformat();
        }

        date_default_timezone_set('Europe/Paris');
        echo mktime($heures, $minutes, $secondes, $mois, $jours, $annees)."\n";
    }
    else
        wrongformat();
}
else
    wrongformat();

?>