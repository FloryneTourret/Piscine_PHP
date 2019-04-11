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

function ft_move($partie, $nbJ, $nbV, $axe, $coeff) {
    $joueur = $partie->getJoueur($nbJ);
    $flotte = $joueur->getFlotte();
    $vaisseau = $flotte->getVaisseau($nbV);
    $vaisseau->move($axe, $coeff);
    return ;
}

function ft_shoot($partie, $nbJ, $nbV, $ennemi) {
    $joueur = $partie->getJoueur($nbJ);
    $flotte = $joueur->getFlotte();
    $vaisseau = $flotte->getVaisseau($nbV);
    $ennemi = $partie->getJoueur($ennemi);
    $vaisseau->tirer($ennemi);
}

function ft_stillAlive($joueur) {
    $flotte = $joueur->getFlotte();
    if ($flotte->getSize() == 0)
        return (0);
    return (1);
}
/*******************************
 *            MAIN             *
 ******************************/

if (!isset($_SESSION["partie"])) {
    if (
        !isset( $_POST["j1"] ) || !isset( $_POST["j2"] ) || !isset( $_POST["submit"] ) ||
        empty( $_POST["j1"] ) || empty( $_POST["j2"] ) || empty( $_POST["submit"] ) ) {
            header( "Location: ./index.html" );
    }
}

if (!isset($_SESSION["partie"]))
{
    $partie = new Partie($_POST["j1"], $_POST["j2"]);
    $grille = $partie->getGrille();
    $current = $partie->getCurrent();
    $panneau = $partie->getPanneau($current);
    $_SESSION["partie"] = serialize($partie);
    $_SESSION["grille"] = serialize($grille);
    $_SESSION["current"] = $current;
    $_SESSION["panneau"] = serialize($panneau);
    header( "Location: ./partie.php" );
} else {
    $partie = unserialize($_SESSION["partie"]);
    $current = $partie->getCurrent();
    $panneau = $partie->getPanneau($current);
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
        switch ($action) {
            case "move":
                $nbJ = intval($_GET["nbJ"]);
                $nbV = intval($_GET["nbV"]);
                $coeff = intval($_GET["coeff"]);
                $axe = $_GET["axe"];
                ft_move($partie, $nbJ, $nbV, $axe, $coeff);
                break;
            case "shoot":
                $nbJ = intval($_GET["nbJ"]);
                $nbV = intval($_GET["nbV"]);
                $ennemi = intval($_GET["ennemi"]);
                ft_shoot($partie, $nbJ, $nbV, $ennemi);
                $flotte1 = $partie->getJoueur(1)->getFlotte();
                $flotte1->update();
                $flotte2 = $partie->getJoueur(2)->getFlotte();
                $flotte2->update();
                break;
            case "load":
                $nbJ = intval($_GET["nbJ"]);
                $nbV = intval($_GET["nbV"]);
                $joueur = $partie->getJoueur($nbJ);
                $flotte = $joueur->getFlotte();
                $vaisseau = $flotte->getVaisseau($nbV);
                $vaisseau->load();
                break;
            case "wait":
                $panneau->coupFini(10);
                break;
            default:
                break;
        }
        $panneau->coupFini(1);
        if ($panneau->getCoup() <= 0) {
            $partie->finTour();
            $current = $partie->getCurrent();
            $panneau = $partie->getPanneau($current);
        }
    }
    $j1Vivant = ft_stillAlive($partie->getJoueur(1));
    $j2Vivant = ft_stillAlive($partie->getJoueur(2));
    if ($j1Vivant == 0 && $j2Vivant == 0) {
        $_SESSION["gagnant"] = 0;
        header( "Location: ./end.php" );
        exit();
    } elseif ($j1Vivant == 0) {
        $_SESSION["gagnant"] = 2;
        header( "Location: ./end.php" );
        exit();
    } elseif ($j2Vivant == 0) {
        $_SESSION["gagnant"] = 1;
        header( "Location: ./end.php" );
        exit();
    }
    $partie->majVaisseau();
    $grille = $partie->getGrille();
    $_SESSION["partie"] = serialize($partie);
    $_SESSION["grille"] = serialize($grille);
    $_SESSION["current"] = $current;
    $_SESSION["panneau"] = serialize($panneau);
}
header( "Location: ./partie.php" );
?>