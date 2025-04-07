<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

$lesSpectacles = getLesSpectacles();
$messages = recupererMessages();

// Vérifie si l'utilisateur est connecté
$estConnecte = isLoggedOn();

// Traitement du formulaire d'ajout au panier
if (isset($_POST['ajouter_panier'])) {
    // Vérifie si l'utilisateur est connecté
    if ($estConnecte) {
        $idUtilisateur = $_SESSION['idUtilisateur'];
        $idPanier = getIdPanierUser($idUtilisateur);
        
        $idPanier = $_POST['id_panier'];
        $idSpectacle = $_POST['id_spectacle'];
        $nb_places = $_POST['nb_places'];
    
        ajouterPanier($idPanier, $idSpectacle, $nb_places);
        gererSucces("Le spectacle a été ajouté à votre panier", "?action=boutique");
    } else {
        // L'utilisateur n'est pas connecté, on affiche un message d'erreur
        gererErreur("Vous devez être connecté pour ajouter des spectacles à votre panier", "?action=boutique");
    }
}

// Obtenir l'ID du panier si l'utilisateur est connecté
$idPanier = null;
if ($estConnecte) {
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $mailU = getMailULoggedOn();
    $idPanier = getIdPanierUser($idUtilisateur);
}

$titre = "Boutique - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueBoutique.php";
include "$racine/vue/pied.html.php";
?>