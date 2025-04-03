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
    
    $titre = "Mon profil - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}

if (estAdmin(getUtilisateursById(getMailULoggedOn()))){
    $lesOiseaux = getLesOiseaux();
    $lesSpectacles = getLesSpectacles();
    $lesOiseauxAvecSpectacle = getLesOiseauxSpectacle();
    $lesOiseauxSansSpectacle = getLesOiseauxSansSpectacle();

    $ajouterOiseauSpectacle = ajouterOiseauSpectacle($lesOiseauxSansSpectacle, $lesSpectacles);
    $retirerOiseauSpectacle = retirerOiseauSpectacle($lesOiseauxAvecSpectacle);

    $titre = "Mon profil - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil - Oizo";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}

?>