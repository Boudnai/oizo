<?php
// init.php - Fichier d'initialisation à inclure au début de chaque contrôleur

// Démarrage de la session si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Chemin racine pour les inclusions
$racine = dirname(__FILE__);

// Inclure les fichiers essentiels
include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.oizo.inc.php"; // Ajout de cette ligne

// Fonction pour gérer les erreurs et rediriger si nécessaire
function gererErreur($message, $redirect = null) {
    $_SESSION['message_erreur'] = $message;
    if ($redirect) {
        header("Location: $redirect");
        exit();
    }
}

// Fonction pour gérer les succès et rediriger si nécessaire
function gererSucces($message, $redirect = null) {
    $_SESSION['message_succes'] = $message;
    if ($redirect) {
        header("Location: $redirect");
        exit();
    }
}

// Fonction pour récupérer et effacer les messages de session
function recupererMessages() {
    $messages = [
        'erreur' => isset($_SESSION['message_erreur']) ? $_SESSION['message_erreur'] : null,
        'succes' => isset($_SESSION['message_succes']) ? $_SESSION['message_succes'] : null
    ];
    
    // Effacer les messages après les avoir récupérés
    unset($_SESSION['message_erreur']);
    unset($_SESSION['message_succes']);
    
    return $messages;
}

// Vérifier si l'utilisateur est connecté
$utilisateurConnecte = isLoggedOn();
$estAdmin = false;

// Si l'utilisateur est connecté, récupérer ses informations
if ($utilisateurConnecte) {
    $mailU = getMailULoggedOn();
    $utilisateur = getUtilisateurByEmail($mailU);
    
    // Vérifier si l'utilisateur est admin
    if (isset($utilisateur['idUtilisateur'])) {
        $estAdmin = estAdmin($utilisateur['idUtilisateur']);
    }
}
?>