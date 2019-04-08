<?php
session_start();

include('configs/database.php');
include('models/commandes_model.php');

include('views/base/header_profile.php');
include('views/base/sidebar_profil.php');
$commandes = get_commandes($mysqli);
include('views/commandes_view.php');

include('views/base/footer.php');
?>