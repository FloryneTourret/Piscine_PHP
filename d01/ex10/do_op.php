#!/usr/bin/php
<?php 

if ($argc == 4)
{
	$operateur = trim($argv[2]);
	$num1 = trim($argv[1]);
	$num2 = trim($argv[3]);
	if (is_numeric($num1) && is_numeric($num2))
	{
		if ($operateur == '+')
			$res = $num1 + $num2;
		else if ($operateur == '-')
			$res = $num1 - $num2;
		else if ($operateur == '*')
			$res = $num1 * $num2;
		else if ($operateur == '/')
			$res = $num1 / $num2;
		else if ($operateur == '%')
			$res = $num1 % $num2;
		else
			$res = "Incorrect Parameters";
	}
	else 
		$res = "Incorrect Parameters";
	echo $res."\n";
}

?>