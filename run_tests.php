<?php
// Fichier: run_tests.php

// Déterminer le chemin racine
$racine = dirname(__FILE__);

// Créer le dossier de tests s'il n'existe pas
if (!is_dir($racine . '/tests')) {
    mkdir($racine . '/tests', 0755, true);
}

// Chemin vers le fichier de test
$testFile = $racine . '/tests/OiseauTest.php';

// Message d'information
echo "=== Préparation de l'environnement de test ===\n\n";
echo "Vérification du dossier de tests...\n";
echo "Dossier de tests : " . ($racine . '/tests') . " " . (is_dir($racine . '/tests') ? "(existe)" : "(créé)") . "\n\n";

// Vérifier si le fichier de test existe
if (!file_exists($testFile)) {
    echo "Le fichier de test n'existe pas. Veuillez créer le fichier tests/OiseauTest.php\n";
    exit(1);
}

echo "Exécution des tests unitaires...\n\n";

// Exécuter le test
require_once $testFile;

// Le reste de l'exécution sera géré par le fichier OiseauTest.php lui-même