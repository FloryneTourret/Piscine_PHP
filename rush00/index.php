<?php
session_start();

include('configs/database.php');
include('models/index_model.php');

include('views/base/header.php');
$articles = get_last_articles($mysqli);
$categories = get_categories($mysqli);
include('views/index_view.php');

include('views/base/footer.php');
?>