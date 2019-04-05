<?php
session_start();

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
//include('../models/admin/categories_model.php');

include('../views/base/header_admin.php');
//include('../views/admin/categories_view.php');

include('../views/base/footer_admin.php');
?>