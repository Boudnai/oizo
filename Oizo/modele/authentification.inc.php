<?php

include_once "bd.utilisateur.inc.php";

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByEmail($mailU);

    if($util){
        $mdpBD = $util["mdp"];
        if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
            // le mot de passe est celui de l'utilisateur dans la base de donnees
            $_SESSION["Email"] = $mailU;
            $_SESSION["mdp"] = $mdpBD;
            $_SESSION["idUtilisateur"] =  $util["idUtilisateur"];
        }
    }  
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["Email"]);
    unset($_SESSION["mdp"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["Email"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["Email"])) {
        $util = getUtilisateurByEmail($_SESSION["Email"]);
        if ($util["Email"] == $_SESSION["Email"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("mathieu.capliez@gmail.com", "Passe1?");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>