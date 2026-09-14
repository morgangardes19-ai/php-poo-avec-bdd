
<?php
// SECURITE
 if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("Location: ../public/index.php?error=bad-method");
    exit();
 }
 if (!isset($_POST['prenom']) || !isset($_POST['nom'])) {
    header("Location: ../public/index.php?error=missing-value");
    exit();
 }
 if (empty($_POST['prenom']) || empty($_POST['nom'])) {
    header("Location: ../public/index.php?error=empty-value");
    exit();
 }

// INPUT SANITIZATION
$prenom = htmlspecialchars(trim($_POST["prenom"]));
$nom = htmlspecialchars(trim($_POST["nom"]));

// var_dump($intitule);

// si les données sont juste et sécurisé, on veut mettre en BDD puis rediriger
require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

$auteurRepository = new AuteurRepository($db);
$isSuccess = $auteurRepository->insert($prenom, $nom);

if ($isSuccess) {
    header("Location: ../public/categories.php");
} else {
    header("Location: ../public/add-categorie.php?error=database-failed");
}


?>