<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

logout();

$titre = "Connexion - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueConnexion.php";
include "$racine/vue/pied.html.php";


?>