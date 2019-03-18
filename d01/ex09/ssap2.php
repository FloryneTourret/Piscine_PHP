#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = preg_replace('/ +/', ' ', trim($str));
	$array = explode(" ", $str);
	sort($array);
	return ($array);
}

function array_alpha($array)
{
	$new_array = array();

	foreach ($array as $word)
	{
		if (ctype_alpha($word))
				$new_array[] = $word;
	}
	natcasesort($new_array);
	return ($new_array);
}

function array_numbers($array)
{
	$new_array = array();

	foreach ($array as $word)
	{
		if (is_numeric($word))
			$new_array[] = $word;
	}
	sort($new_array, SORT_STRING);
	return ($new_array);
}

function array_else($array, $alpha, $numbers)
{
	$new_array = array();

	foreach ($array as $word)
	{
		if (!in_array($word, $alpha) && !in_array($word, $numbers))
			$new_array[] = $word;
	}
	sort($new_array);
	return ($new_array);
}

$i = 1;
while ($i < $argc)
{
	$array[] = ft_split($argv[$i]);
	$i++;
}
$i = 0;
$final = array();
while ($array[$i])
{
	$final = array_merge($final, $array[$i]);
	$i++;
}
$alpha = array_alpha($final);
$numbers = array_numbers($final);
$else = array_else($final, $alpha, $numbers);

foreach ($alpha as $word)
	echo "$word\n";
foreach ($numbers as $word)
	echo "$word\n";
foreach ($else as $word)
	echo "$word\n";

?>