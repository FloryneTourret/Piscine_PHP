#!/usr/bin/php
<?php 

function ft_is_sort($array)
{
	$array1 = $array;
	sort($array1);
	if ($array1 == $array)
		return (1);
	else
		return (0);
}

?>