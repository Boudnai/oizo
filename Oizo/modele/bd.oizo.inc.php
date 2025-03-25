<?php

include_once "bd.inc.php";


function getRapacesJour() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau WHERE typeO='Rapace diurne'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRapacesNuit() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau WHERE typeO='Rapace nocturne'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getExotiques() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau WHERE typeO='Exotique'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAquatiques() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau WHERE typeO='Aquatique'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPassereaux() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau WHERE typeO='Passereaux'");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getIdPanierUser($idU){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT idPanier FROM Panier WHERE idUtilisateur = :idUtilisateur");
        $req->bindValue(':idUtilisateur', $idU, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajouterPanier($idPanier, $idSpectacle, $nbPlaces) {
    $resultat = [];
   
    try {
        $cnx = connexionPDO();

        // Vérifier si le produit est déjà dans le panier
        $req = $cnx->prepare("SELECT * FROM contenir WHERE idPanier = :idPanier AND idSpectacle = :idSpectacle");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->bindValue(':idSpectacle', $idSpectacle, PDO::PARAM_INT);
        $req->execute();

        if ($req->rowCount() > 0) {
            // Mettre à jour la quantité du produit dans le panier
            $req = $cnx->prepare("UPDATE contenir SET nbPlaces = nbPlaces + :nbPlaces WHERE idPanier = :idPanier AND idSpectacle = :idSpectacle");
            $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
            $req->bindValue(':idSpectacle', $idSpectacle, PDO::PARAM_INT);
            $req->bindValue(':nbPlaces', $nbPlaces, PDO::PARAM_INT);
            $req->execute();
            
            $message = 'Quantité du produit mise à jour dans le panier !';
        } else {
            // Ajouter le produit au panier
            $req = $cnx->prepare("INSERT INTO contenir(idSpectacle, idPanier, nbPlaces) VALUES(:idSpectacle, :idPanier, :nbPlaces)");
            $req->bindValue(':idSpectacle', $idSpectacle, PDO::PARAM_INT);
            $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
            $req->bindValue(':nbPlaces', $nbPlaces, PDO::PARAM_INT);
            $req->execute();
            
            $message = 'Objet ajouté au panier !';
        }

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getObjetsPanier($idPanier) {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT S.titre, S.prix, S.libelle, c.nbPlaces, c.idPanier, c.idSpectacle FROM Spectale S, contenir c WHERE c.idPanier = :idPanier AND S.idSpectacle = c.idSpectacle");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updatePanier($idPanier, $idSpectacle, $nbPlaces){
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE contenir SET nbPlaces=:nbPlaces WHERE idPanier=:idPanier AND idSpectacle=:idSpectacle");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->bindValue(':idSpectacle', $idSpectacle, PDO::PARAM_INT);
        $req->bindValue(':nbPlaces', $nbPlaces, PDO::PARAM_INT);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function deleteObjet($idPanier, $idSpectacle){
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("DELETE FROM contenir WHERE idPanier=:idPanier and idSpectacle=:idSpectacle");
        $req->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
        $req->bindValue(':idSpectacle', $idSpectacle, PDO::PARAM_INT);
        $resultat = $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function participeSpectacle($idOiseau){
    $resultat = false;
    
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT idSpectacle FROM Oiseau WHERE idOiseau = :idOiseau");
        $req->bindValue(':idOiseau', $idOiseau, PDO::PARAM_INT);
        $req->execute();
        $spectacle = $req->fetch(PDO::FETCH_ASSOC);

        if ($spectacle && $spectacle['idSpectacle'] != NULL) {
            $resultat = true; // L'oiseau participe déjà à un spectacle.
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajouterOiseauSpectacle($idOiseau, $idSpectacle) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE Oiseau SET idSpectacle = :idSpectacle WHERE idOiseau = :idOiseau");
        $req->bindValue(':idSpectacle', $idSpectacle, PDO::PARAM_INT);
        $req->bindValue(':idOiseau', $idOiseau, PDO::PARAM_INT);
        return $req->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


function retirerOiseauSpectacle($idOiseau){
    $resultat = false;

    try {
        if (participeSpectacle($idOiseau)) {
            $cnx = connexionPDO();
            $req = $cnx->prepare("UPDATE Oiseau SET idSpectacle = NULL WHERE idOiseau = :idOiseau");
            $req->bindValue(':idOiseau', $idOiseau, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $resultat = true; // L'oiseau a été retiré du spectacle.
            }
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLesOiseauxSpectacle(){
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau WHERE idSpectacle NOT NULL");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLesOiseauxSansSpectacle(){
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau WHERE idSpectacle NULL");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLesOiseaux() {
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Oiseau");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLesSpectacles(){
    $resultat = [];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM Spectacle");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function estAdmin($idUtilisateur){
    $resultat = false;
    
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT nom FROM Utilisateur WHERE idUtiliateur = :idUtilisateur");
        $req->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
        $req->execute();
        $admin = $req->fetch(PDO::FETCH_ASSOC);

        if ($admin && $admin['nom'] == 'Admin') {
            $resultat = true; // L'utilisateur est admin
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}