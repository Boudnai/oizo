<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

// Inclusion des fichiers nécessaires
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

// Récupérer les messages éventuels
$messages = recupererMessages();

// Formulaire de connexion ou traitement de la connexion
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // Afficher le formulaire de connexion
    $titre = "Connexion - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.html.php";
} else {
    // Traiter le formulaire de connexion
    if (!isset($_POST["Email"]) || !isset($_POST["mdp"])) {
        gererErreur("Veuillez remplir tous les champs", "?action=connexion");
        exit;
    }
    
    $mailU = $_POST["Email"];
    $mdpU = $_POST["mdp"];
    
    // Tentative de connexion
    login($mailU, $mdpU);
    
    if (isLoggedOn()) {
        // Connexion réussie
        gererSucces("Connexion réussie", "?action=accueil");
        exit;
    } else {
        // Échec de la connexion
        gererErreur("Email ou mot de passe incorrect", "?action=connexion");
        exit;
    }
}
?>