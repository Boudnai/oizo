<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

$inscrit = false;
$msg="";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["nom"]) && isset($_POST["PrenomUtilisateur"]) && isset($_POST["Email"]) && isset($_POST["mdp"])) {

    if ($_POST["nom"] != "" && $_POST["PrenomUtilisateur"] != "" && $_POST["Email"] != "" && $_POST["mdp"] != "") {
        $nomU = $_POST["nom"];
        $prenomU = $_POST["PrenomUtilisateur"];
        $mailU = $_POST["Email"];
        $mdpU = $_POST["mdp"];

        // enregistrement des donnees
        $ret = addUtilisateur($nomU, $prenomU, $mailU, $mdpU);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "l'utilisateur n'a pas été enregistré.";
        }
    }
 else {
    $msg="Renseigner tous les champs...";    
    }
}

if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueConfirmationInscription.php";
    include "$racine/vue/pied.html.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueInscription.php";
    include "$racine/vue/pied.html.php";
}

?>