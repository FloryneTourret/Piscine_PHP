<?php
session_start();

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
//include('../models/admin/utilisateurs_model.php');

include('../views/base/header_admin.php');
//include('../views/admin/utilisateurs_view.php');

include('../views/base/footer_admin.php');
?>