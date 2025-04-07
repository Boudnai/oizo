<?php
// controleurPrincipal.php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["boutique"] = "boutique.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["panier"] = "panier.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["oiseaux"] = "oiseaux.php"; 
    $lesActions["ajouterOiseauSpectacle"] = "ajouterOiseauSpectacle.php";
    $lesActions["retirerOiseauSpectacle"] = "retirerOiseauSpectacle.php";
   
    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}

// Fonction pour sécuriser le contrôleur (à ajouter)
function securiserControleur($controleur, $estConnecte, $estAdmin = false) {
    // Liste des contrôleurs nécessitant une connexion
    $controleursSécurisés = [
        "panier.php", "profil.php", "ajoutOS.php", "retraitOS.php"
    ];
    
    // Liste des contrôleurs réservés aux admin
    $controleursAdmin = [
        "ajoutOS.php", "retraitOS.php"
    ];
    
    if (in_array($controleur, $controleursSécurisés) && !$estConnecte) {
        gererErreur("Vous devez être connecté pour accéder à cette page.", "./?action=connexion");
        return false;
    }
    
    if (in_array($controleur, $controleursAdmin) && !$estAdmin) {
        gererErreur("Vous n'avez pas les droits pour accéder à cette page.", "./?action=defaut");
        return false;
    }
    
    return true;
}
?>