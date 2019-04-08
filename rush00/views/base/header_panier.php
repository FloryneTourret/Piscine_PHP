<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ft_minishop</title>
    <link rel="icon" href="assets/img/favicon.ico" />

    <!-- Fichiers css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/panier.css">
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/grille.css">
    
    <!-- Link des fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<div class="topnav clearfix" id="myTopnav">
  <a href="index.php">ft_minishop</a>
  <?php if(isset($_SESSION['email'])){ ?>
  <a href="logout.php" class="float-right">Déconnexion</a>
  <?php if($_SESSION['role'] == 'admin'){ ?>
  <a href="admin/commandes.php" class="float-right">Panel admin</a>
  <?php }?>
  <a href="profil.php" class="float-right"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?></a>
  <?php }else{?>
    <a href="register.php" class="float-right">S'inscrire</a>
    <a href="login.php" class="float-right">Se connecter</a>
  <?php }?>
  <a href="panier.php" class="float-right"><i class="fas fa-shopping-bag"></i></a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>