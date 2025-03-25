<?php

include_once "bd.inc.php";

function getUtilisateurs() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByEmail($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur where Email=:email");
        $req->bindValue(':email', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateursById($mailU){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select idUtilisateur from Utilisateur where Email=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($nom, $prenom, $mailU, $mdpU) {
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("insert into Utilisateur (nom, PrenomUtilisateur, Email, mdp) values(:nom,:prenom,:mail,:mdp)");
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':mail', $mailU, PDO::PARAM_STR);
        $req->bindValue(':mdpU', $mdpUCrypt, PDO::PARAM_STR);
        
        $resultat = $req->execute();

        // Récupérer l'idU de l'utilisateur nouvellement inséré
        $idU = $cnx->lastInsertId();

        // Insérer un nouveau panier pour cet utilisateur
        $reqPanier = $cnx->prepare("INSERT INTO Panier (idUtilisateur) VALUES (:idUtilisateur)");
        $reqPanier->bindValue(':idUtilisateur', $idU, PDO::PARAM_INT);
        $resultatPanier = $reqPanier->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtMdpUtilisateur($mailU, $mdpU) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("update Utilisateur set mdp=:mdpU where Email=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':mdpU', $mdpUCrypt, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getUtilisateurs() : \n";
    print_r(getUtilisateurs());

    echo "getUtilisateurByEmail(\"mathieu.capliez@gmail.com\") : \n";
    print_r(getUtilisateurByMailU("mathieu.capliez@gmail.com"));

    echo "addUtilisateur(\"mathieu.capliez3@gmail.com\") : \n";
    addUtilisateur("Mathieu","Capliez","mathieu.capliez3@gmail.com", "Passe1?");
}
?>