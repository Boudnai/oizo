<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";

$lesOiseaux = getLesOiseaux();
$lesSpectacles = getLesSpectacles();

$lesOiseauxAvecSpectacle = getLesOiseauxSpectacle();

$retirerOiseauSpectacle = retirerOiseauSpectacle($lesOiseauxAvecSpectacle);

$titre = "Mon profil - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRetraitOS.php";
include "$racine/vue/pied.html.php";

?>