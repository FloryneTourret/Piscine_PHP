<?php
session_start();

include('configs/database.php');
//include('models/panier_model.php');

include('views/base/header.php');
include('views/panier_view.php');

include('views/base/footer.php');
?>