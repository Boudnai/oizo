<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.oizo.inc.php";

if (isLoggedOn()){
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByEmail($mailU);
    
    // Récupérer l'ID de l'utilisateur correctement
    $idUtilisateur = $util["idUtilisateur"];
    
    // Vérifier si l'utilisateur est admin
    $estAdmin = estAdmin($idUtilisateur);
    
    // Si l'utilisateur est admin, charger les données nécessaires
    if ($estAdmin) {
        $lesOiseaux = getLesOiseaux();
        $lesSpectacles = getLesSpectacles();
        $lesOiseauxAvecSpectacle = getLesOiseauxSpectacle();
        $lesOiseauxSansSpectacle = getLesOiseauxSansSpectacle();
    }
    
    // Afficher le profil
    $titre = "Mon profil - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";
}
else {
    // Rediriger vers la page de connexion ou afficher un message
    $titre = "Mon profil - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}
?>