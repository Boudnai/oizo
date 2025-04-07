<?php
// Inclusion du fichier d'initialisation n'est plus nécessaire ici
// car il est déjà inclus dans index.php

// Inclusion spécifique pour ce contrôleur
include_once "$racine/modele/bd.oizo.inc.php";

// Initialiser variables
$resultat = [];
$prixTotal = 0;
$messages = recupererMessages();

// L'utilisateur est forcément connecté (grâce à securiserControleur)
$idU = $utilisateur['idUtilisateur'];

// Récupérer le panier de l'utilisateur
$idPanier = getIdPanierUser($idU);

// Vérifier si idPanier existe
if (is_array($idPanier) && isset($idPanier['idPanier'])) {
    // Traiter les actions POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['update_quantite'])) {
            $panierID = $_POST['id_panier'];
            $idSpectacle = $_POST['id_spectacle'];
            $nb_places = (int)$_POST['nb_places'];
            
            if ($nb_places > 0) {
                if (updatePanier($panierID, $idSpectacle, $nb_places)) {
                    gererSucces('Quantité mise à jour', '?action=panier');
                } else {
                    gererErreur('Erreur lors de la mise à jour de la quantité', '?action=panier');
                }
            } else {
                gererErreur('Veuillez entrer une quantité valide', '?action=panier');
            }
        }
        
        if (isset($_POST['delete'])) {
            $panierID = $_POST['id_panier'];
            $idSpectacle = $_POST['id_spectacle'];
            
            if (deleteObjet($panierID, $idSpectacle)) {
                gererSucces('Objet retiré du panier', '?action=panier');
            } else {
                gererErreur('Erreur lors de la suppression de l\'objet', '?action=panier');
            }
        }
    }
    
    // Récupérer les objets du panier
    $resultat = getObjetsPanier($idPanier['idPanier']);
    
    // Calculer le prix total
    if (is_array($resultat)) {
        foreach ($resultat as $item) {
            $prixTotal += $item['prix'] * $item['nbPlaces'];
        }
    }
} else {
    $messages['erreur'] = 'Erreur: Panier non trouvé.';
}

// Afficher la page
$titre = "Panier - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vuePanier.php";
include "$racine/vue/pied.html.php";
?>