#!/usr/bin/php
<?php 

function ft_split($str)
{
	$str = preg_replace('/ +/', ' ', trim($str));
	$array = explode(" ", $str);
	return ($array);
}

$array = ft_split($argv[1]);
$i = 1;
while ($array[$i])
{
	echo $array[$i];
	echo " ";
	$i++;
}
if ($argv[1])
	echo $array[0]."\n";

?>