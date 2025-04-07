<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

$lesRapacesJours = getRapacesJour();
$lesRapacesNuit = getRapacesNuit();
$lesExotiques = getExotiques();
$lesAquatiques = getAquatiques();
$lesPassereaux = getPassereaux();

$titre = "Oiseaux - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueOiseaux.php";
include "$racine/vue/pied.html.php";

?>