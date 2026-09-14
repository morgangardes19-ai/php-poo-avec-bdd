<?php
// Exemples de choses qu'on peut faire ici dans ce process : 
// - Vérifier si la réponse est bonne
// - Incrémenter le score si la réponse est bonne
// - Passer à la question suivante
require_once "../utils/autoloader.php";
session_start();

// 1. Récupérer la réponse cliquée depuis l'URL
$choix = htmlspecialchars(trim($_GET['choix']));

// 2. Récupérer la question actuelle (comme dans questions.php)
$questionActuelle = $_SESSION["questions"][$_SESSION["indicateur_question"]];

// 3. Récupérer la réponse choisie parmi les réponses de la question
$reponseChoisie = $questionActuelle->getAnswers()[$choix];

// 4. Si la réponse est correcte, augmenter le score
if ($reponseChoisie->isCorrect()) {
    $_SESSION["score"] = $_SESSION["score"] + 1;
}

if ($_SESSION["indicateur_question"] === count($_SESSION["questions"]) - 1) {
    header("Location: ../public/score.php");
    exit();
} else {
    // 5. Passer à la question suivante
    $_SESSION["indicateur_question"] = $_SESSION["indicateur_question"] + 1;
}
header("Location: ../public/questions.php");
exit();
