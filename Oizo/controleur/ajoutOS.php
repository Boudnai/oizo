<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";

$lesOiseaux = getLesOiseaux();
$lesSpectacles = getLesSpectacles();

$lesOiseauxSansSpectacle = getLesOiseauxSansSpectacle();




if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["idOiseau"]) && !empty($_POST["idSpectacle"])) {
        $idOiseau = (int) $_POST["idOiseau"];
        $idSpectacle = (int) $_POST["idSpectacle"];

        // Appel de la fonction pour ajouter l’oiseau au spectacle
        if (ajouterOiseauSpectacle($idOiseau, $idSpectacle)) {
            echo "Oiseau ajouté au spectacle avec succès !";
        } else {
            echo "Erreur lors de l'ajout de l'oiseau au spectacle.";
        }
    } else {
        echo "Données invalides.";
    }
} else {
    echo "Requête invalide.";
}



$titre = "Mon profil - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAjoutOS.php";
include "$racine/vue/pied.html.php";

?>