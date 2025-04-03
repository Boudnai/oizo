<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["ajoutOS"] = "ajoutOS.php";
    $lesActions["boutique"] = "boutique.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["panier"] = "panier.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["oiseaux"] = "oiseaux.php"; 



   
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>