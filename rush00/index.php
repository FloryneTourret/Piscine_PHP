<?php
session_start();

include('configs/database.php');
include('models/index_model.php');

include('views/base/header.php');
include('views/index_view.php');

include('views/base/footer.php');
?>