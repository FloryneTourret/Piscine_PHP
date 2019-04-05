<?php
session_start();

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
//include('../models/admin/suppression_model.php');

include('../views/base/header_admin.php');
//include('../views/admin/suppression_view.php');

include('../views/base/footer_admin.php');
?>