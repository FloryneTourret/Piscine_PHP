#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = preg_replace('/ +/', ' ', trim($str));
	$array = explode(" ", $str);
	sort($array);
	return ($array);
}

$i = 1;
$j = 0;
while ($i < $argc)
{
	$array[$j] = ft_split($argv[$i]);
	$i++;
	$j++;
}
$i = 0;
$final = array();
while ($array[$i])
{
	$final = array_merge($final, $array[$i]);
	$i++;
}
sort($final);
$i = 0;
while ($final[$i])
{
	echo $final[$i];
	echo "\n";
	$i++;
}
?>