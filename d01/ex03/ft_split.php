<?php 

function ft_split($str)
{
	$str = preg_replace('/ +/', ' ', trim($str));
	$array = explode(" ", $str);
	sort($array);
	return ($array);
}

?>
