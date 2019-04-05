<?php

$db = new mysqli('172.20.0.2', 'root', 'rootpass');
mysqli_query($db, file_get_contents('database.sql'));

$mysqli = new mysqli('172.20.0.2', 'root', 'rootpass', 'ft_minishop');
mysqli_multi_query($mysqli, file_get_contents('content.sql'));

?>