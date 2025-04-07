<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";

// Vérifier si l'utilisateur est connecté et s'il est admin
if (isLoggedOn()) {
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByEmail($mailU);
    
    if (!estAdmin($util["idUtilisateur"])) {
        gererErreur("Vous n'avez pas les droits pour effectuer cette action", "?action=profil");
        exit;
    }
    
    // Traiter la soumission du formulaire
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST["idOiseau"])) {
            $idOiseau = (int) $_POST["idOiseau"];
            
            // Vérifier si l'oiseau est associé à un spectacle
            if (participeSpectacle($idOiseau)) {
                // Retirer l'oiseau du spectacle
                if (retirerOiseauSpectacle($idOiseau)) {
                    gererSucces("L'oiseau a été retiré du spectacle avec succès", "?action=profil");
                } else {
                    gererErreur("Erreur lors du retrait de l'oiseau du spectacle", "?action=profil");
                }
            } else {
                gererErreur("Cet oiseau ne participe à aucun spectacle", "?action=profil");
            }
        } else {
            gererErreur("Données manquantes", "?action=profil");
        }
    } else {
        gererErreur("Méthode non autorisée", "?action=profil");
    }
} else {
    gererErreur("Vous devez être connecté pour effectuer cette action", "?action=connexion");
}
?>