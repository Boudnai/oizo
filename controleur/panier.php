<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";


session_start();
$idU = $_SESSION['idUtilisateur'];

$idPanier = getIdPanierUser($idU);

$resultat = getObjetsPanier($idPanier['idPanier']);


$prixTotal = 0;

if(isset($_POST['update_quantite'])){
    $idPanier = $_POST['id_panier'];
    $idSpectacle = $_POST['id_spectacle'];
    $nb_places = $_POST['nb_places'];

    updatePanier($idPanier, $idSpectacle, $nb_places);
    $msg = 'Quantité mise à jour';
    header('location:?action=panier');
}

if(isset($_POST['delete'])){
    $idPanier = $_POST['id_panier'];
    $idSpectacle = $_POST['id_spectacle'];

    deleteObjet($idPanier, $idSpectacle);
    $msg = 'Objet retiré du panier';
    header('location:?action=panier');
}

$titre = "Panier - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vuePanier.php";
include "$racine/vue/pied.html.php";

?>