<?php
session_start();

include('configs/database.php');
//include('models/categories_model.php');

include('views/base/header.php');
include('views/categories_view.php');

include('views/base/footer.php');
?>