#!/usr/bin/php
<?php 

function ft_split($str)
{
    $str = preg_replace('/ +/', ' ', trim($str));
    $array = explode(" ", $str);
	return ($array);
}

function ft_cut($str)
{
    $str = preg_replace('/ +/', '', trim($str));
    if (is_numeric($str[0]))
        $i = 0;
    else
        $i = 1;
    $array = array();
    while($str[$i] || $str[$i] == '0')
    {
        if (!is_numeric($str[$i]) && $str[$i] != '.')
        {
            $array[0] = trim(substr($str, 0, $i));
            $array[1] = trim($str[$i]);
            $array[2] = trim(substr($str, $i + 1));
            break;
        }
        $i++;
    }
        
    return ($array);
}

if ($argc == 2)
{
	$operateur = ft_split($argv[1])[1];
	$num1 = ft_split($argv[1])[0];
    $num2 = ft_split($argv[1])[2];
    if (empty($operateur) || empty($num2))
    {
        $operateur = ft_cut($argv[1])[1];
        $num1 = ft_cut($argv[1])[0];
        $num2 = ft_cut($argv[1])[2];
    }
	if (is_numeric($num1) && is_numeric($num2))
	{
		if ($operateur == '+')
			$res = $num1 + $num2;
		else if ($operateur == '-')
			$res = $num1 - $num2;
		else if ($operateur == '*')
			$res = $num1 * $num2;
        else if ($operateur == '/')
        {
            if ($num2 == 0)
                $res = "Syntax Error";
            else
                $res = $num1 / $num2;
        }
        else if ($operateur == '%')
        {
            if ($num2 == 0)
                $res = "Syntax Error";
            else
			    $res = $num1 % $num2;
        }
		else
			$res = "Syntax Error";
	}
	else 
		$res = "Syntax Error";
	echo $res."\n";
}
else
{
	$res = "Incorrect Parameters";
	echo $res."\n";
}

?>