<?php
session_start();

require_once( "./Trait/Doc.trait.php" );
require_once( "./Class/Vaisseau.class.php" );
require_once( "./Class/Fox.class.php" );
require_once( "./Class/Arme.class.php" );
require_once( "./Class/Blaster.class.php" );
require_once( "./Class/Flotte.class.php" );
require_once( "./Class/Grille.class.php" );
require_once( "./Class/Joueur.class.php" );
require_once( "./Class/Obstacle.class.php" );
require_once( "./Class/Panneau.class.php" );
require_once( "./Class/Partie.class.php" );
if (!isset($_SESSION["partie"]) || !isset($_SESSION["grille"]))
    header("Location: ./index.html");
    $grille = unserialize($_SESSION["grille"]);
    $current = $_SESSION["current"];
    $panneau = unserialize($_SESSION["panneau"]);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Starships Battles</title>
</head>
<body>
    <div style="display: none" id="hideAll">
        <h2>Starships Battles</h2>
        <div id="content">
            <div id="j1p">
                <?php
                    if ($current === 1)
                        echo($panneau);
                ?>
            </div>
            <div id="grille">
                <?php
                    echo($grille);
                ?>
            </div>
            <div id="j2p">
            <?php
                if ($current === 2)
                    echo($panneau);
            ?>
            </div>

        </div>
    </div>
    <script type="text/javascript">
    document.getElementById("hideAll").style.display = "block";
    </script> 
</body>
</html>