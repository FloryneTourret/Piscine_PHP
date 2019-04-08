<?php
session_start();

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
include('../models/admin/commandes_model.php');

include('../views/base/header_admin.php');
include('../views/base/sidebar.php');
$commandes = get_commandes($mysqli);
include('../views/admin/commandes_view.php');

include('../views/base/footer_admin.php');
?>