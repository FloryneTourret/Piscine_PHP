<?php

$mysqli = new mysqli('172.23.0.2', 'root', 'rootpass');
mysqli_query($mysqli, file_get_contents('database.sql'));

?>