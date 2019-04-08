<?php
session_start();

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
include('../models/admin/utilisateurs_model.php');

include('../views/base/header_admin.php');
include('../views/base/sidebar.php');
$utilisateurs = get_utilisateurs($mysqli);
include('../views/admin/utilisateurs_view.php');
if(isset($_GET['del']))
{
    if(is_numeric($_GET['del']))
    {
        $id = $_GET['del'];
        suppression_utilisateur($mysqli, $id);
    }
}

include('../views/base/footer_admin.php');
?>