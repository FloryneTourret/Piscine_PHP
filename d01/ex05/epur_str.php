#!/usr/bin/php
<?php 

function ft_split($str)
{
	$str = preg_replace('/ +/', ' ', trim($str));
	$array = explode(" ", $str);
	return ($array);
}

if ($argc != 2)
	echo "\n";
else
{
	$i = 0;
	$array = ft_split($argv[1]);
	while ($i < count($array))
	{
		echo $array[$i];
		if ($i + 1 != count($array))
			echo " ";
		$i++;
	}
}

?>
