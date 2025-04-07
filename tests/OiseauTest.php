<?php
// Fichier: tests/OiseauTest.php

// On inclut les fichiers nécessaires pour les tests
require_once dirname(__DIR__) . '/modele/bd.inc.php';
require_once dirname(__DIR__) . '/modele/bd.oizo.inc.php';

/**
 * Classe de test pour les fonctions liées aux oiseaux
 */
class OiseauTest {
    /**
     * Teste la fonction getLesOiseaux()
     */
    public function testGetLesOiseaux() {
        echo "Test de getLesOiseaux() : ";
        
        // 1. On exécute la fonction à tester
        $oiseaux = getLesOiseaux();
        
        // 2. On vérifie le résultat
        if (!is_array($oiseaux)) {
            echo "ÉCHEC - La fonction ne retourne pas un tableau\n";
            return false;
        }
        
        if (count($oiseaux) === 0) {
            echo "ÉCHEC - Le tableau retourné est vide\n";
            return false;
        }
        
        // Vérifie que chaque oiseau a les propriétés attendues
        $premierOiseau = $oiseaux[0];
        if (!isset($premierOiseau['idOiseau']) || !isset($premierOiseau['nom']) || 
            !isset($premierOiseau['espece']) || !isset($premierOiseau['typeO'])) {
            echo "ÉCHEC - Les oiseaux ne contiennent pas toutes les propriétés attendues\n";
            return false;
        }
        
        echo "SUCCÈS - La fonction retourne un tableau d'oiseaux correctement formaté\n";
        return true;
    }
    
    /**
     * Teste la fonction getRapacesJour()
     */
    public function testGetRapacesJour() {
        echo "Test de getRapacesJour() : ";
        
        // 1. On exécute la fonction à tester
        $rapaces = getRapacesJour();
        
        // 2. On vérifie le résultat
        if (!is_array($rapaces)) {
            echo "ÉCHEC - La fonction ne retourne pas un tableau\n";
            return false;
        }
        
        // Si le tableau n'est pas vide, vérifie que chaque rapace est bien un rapace diurne
        if (count($rapaces) > 0) {
            foreach ($rapaces as $rapace) {
                // On vérifie que le type correspond bien à "rapace diurne" (insensible à la casse)
                if (strtolower($rapace['typeO']) !== 'rapace diurne') {
                    echo "ÉCHEC - Un oiseau qui n'est pas un rapace diurne a été trouvé : " . 
                         $rapace['nom'] . " (" . $rapace['typeO'] . ")\n";
                    return false;
                }
            }
        }
        
        echo "SUCCÈS - La fonction retourne uniquement des rapaces diurnes\n";
        return true;
    }
    
    /**
     * Teste la fonction getLesSpectacles()
     */
    public function testGetLesSpectacles() {
        echo "Test de getLesSpectacles() : ";
        
        // 1. On exécute la fonction à tester
        $spectacles = getLesSpectacles();
        
        // 2. On vérifie le résultat
        if (!is_array($spectacles)) {
            echo "ÉCHEC - La fonction ne retourne pas un tableau\n";
            return false;
        }
        
        if (count($spectacles) === 0) {
            echo "ÉCHEC - Le tableau retourné est vide\n";
            return false;
        }
        
        // Vérifie que chaque spectacle a les propriétés attendues
        $premierSpectacle = $spectacles[0];
        if (!isset($premierSpectacle['idSpectacle']) || !isset($premierSpectacle['titre']) || 
            !isset($premierSpectacle['prix'])) {
            echo "ÉCHEC - Les spectacles ne contiennent pas toutes les propriétés attendues\n";
            return false;
        }
        
        echo "SUCCÈS - La fonction retourne un tableau de spectacles correctement formaté\n";
        return true;
    }
    
    /**
     * Exécute tous les tests
     */
    public function runAllTests() {
        echo "=== Début des tests unitaires ===\n\n";
        
        $testGetLesOiseaux = $this->testGetLesOiseaux();
        echo "\n";
        
        $testGetRapacesJour = $this->testGetRapacesJour();
        echo "\n";
        
        $testGetLesSpectacles = $this->testGetLesSpectacles();
        echo "\n";
        
        echo "=== Résumé des tests ===\n";
        echo "testGetLesOiseaux: " . ($testGetLesOiseaux ? "SUCCÈS" : "ÉCHEC") . "\n";
        echo "testGetRapacesJour: " . ($testGetRapacesJour ? "SUCCÈS" : "ÉCHEC") . "\n";
        echo "testGetLesSpectacles: " . ($testGetLesSpectacles ? "SUCCÈS" : "ÉCHEC") . "\n";
        
        $totalTests = 3;
        $testPassés = ($testGetLesOiseaux ? 1 : 0) + 
                     ($testGetRapacesJour ? 1 : 0) + 
                     ($testGetLesSpectacles ? 1 : 0);
        
        echo "\nRésultat: $testPassés/$totalTests tests réussis\n";
        echo "\n=== Fin des tests unitaires ===\n";
    }
}

// Créer une instance de la classe de test et exécuter tous les tests
$test = new OiseauTest();
$test->runAllTests();