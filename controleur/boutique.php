<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

$lesSpectacles = getLesSpectacles();

session_start();
$idUtilisateur = $_SESSION['idUtilisateur'];
$mailU = getMailULoggedOn();

if (isLoggedOn()){
    $idPanier = getIdPanierUser($idUtilisateur);

    if(isset($_POST['ajouter_panier'])){
        $idPanier = $_POST['id_panier'];
        $idSpectacle = $_POST['id_spectacle'];
        $nb_places = $_POST['nb_places'];
    
        ajouterPanier($idPanier, $idSpectacle, $nb_places);
        header('location:?action=boutique');
    }
}




$titre = "Boutique - Oizo";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueBoutique.php";
include "$racine/vue/pied.html.php";

?>