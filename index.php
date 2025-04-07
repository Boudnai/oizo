<?php
// Inclure le fichier d'initialisation
include "init.php";
include "$racine/controleur/controleurPrincipal.php";

// Déterminer l'action à effectuer
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

// Récupérer le contrôleur correspondant à l'action
$fichier = controleurPrincipal($action);

// Vérifier les permissions avant d'inclure le contrôleur
if (securiserControleur($fichier, $utilisateurConnecte, $estAdmin)) {
    include "$racine/controleur/$fichier";
}
?>