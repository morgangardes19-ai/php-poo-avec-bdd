<!-- SECURITE -->
 <?php 
 if ($_SERVER['REQUEST_METHOD'] !== "GET") {
    header("Location: ../public/index.php?error=bad-method");
    exit();
 }
 if (!isset($_GET['id'])) {
    header("Location: ../public/index.php?error=missing-value");
    exit();
 }
 if (empty($_GET['id'])) {
    header("Location: ../public/index.php?error=empty-value");
    exit();
 }
 ?>


<?php
require_once "../utils/autoloader.php";

$id = intval(htmlspecialchars(trim($_GET['id'])));


// fais une requete bdd avec l'id pour recup toutes les questions et réponses du quiz
// pour simuler l'équivalence je vais recrer les objet POO à la main
// A remplacer plus tard par un appel à la BDD pour récupérer les questions d'un quiz à partir de son id !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ===================== Partie du QCM 1 sur les plantes ========================
if ($id === 1) {

    // Préparations des tableaux de réponse pour créer les questions
    $possibilitesReponsesQuestion1 = [
        new Answer('Une rose', false),
        new Answer('La rafflésie', true)
    ];

    $possibilitesReponsesQuestion2 = [
        new Answer('L\'hydnora africana', true),
        new Answer('Un pissenlit', false)
    ];

    // Préparations des questions possibles pour le Qcm
    $questionPossibleDuQcm = [
        new Question('Quelle est la fleur la plus rare du monde ?', $possibilitesReponsesQuestion1),
        new Question('Quelle plante a inspiré le design des Demogorgons dans la série Stranger Things ?', $possibilitesReponsesQuestion2)
    ];
} else {


    // ==================================================================================

    // ===================== Partie du QCM 2 sur les livres =============================
    // Préparations des tableaux de réponse pour créer les questions
    $possibilitesReponsesQuestion3 = [
        new Answer('Franck Thilliez', false),
        new Answer('Joanne Rowling', true)
    ];

    $possibilitesReponsesQuestion4 = [
        new Answer('Bertrant Piccard', true),
        new Answer('Tony Attwood', false)
    ];

    // Préparations des questions possibles pour le Qcm
    $questionPossibleDuQcm = [
        new Question('Qui a écrit Harry Potter ?', $possibilitesReponsesQuestion3),
        new Question('Qui a écrit le livre Changer d\'altitude ?', $possibilitesReponsesQuestion4)
    ];
    // ====================================================================================
}

// var_dump($questionPossibleDuQcm);
session_start();
// session_destroy();

// On remplit la session en fonction de nos besoin, il y aura potentiellement + de choses plus tard à ranger dedans
$_SESSION['quiz_id'] = $id;
$_SESSION['questions'] = $questionPossibleDuQcm;
$_SESSION['indicateur_question'] = 0;
$_SESSION['score'] = 0;

header("Location: ../public/questions.php");
exit();

?>