
<?php
// SECURITE
 if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("Location: ../public/index.php?error=bad-method");
    exit();
 }
 if (!isset($_POST['id']) || !isset($_POST['prenom']) || !isset($_POST['nom']) ) {
    header("Location: ../public/index.php?error=missing-value");
    exit();
 }
 if (empty($_POST['id']) || empty($_POST['prenom']) || empty($_POST['prenom'])) {
    header("Location: ../public/index.php?error=empty-value");
    exit();
 }

// INPUT SANITIZATION
$id = htmlspecialchars(trim($_POST["id"]));
$prenom = htmlspecialchars(trim($_POST["prenom"]));
$nom = htmlspecialchars(trim($_POST["nom"]));


// si les données sont juste et sécurisé, on veut mettre en BDD puis rediriger
require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

$categorieRepository = new AuteurRepository($db);
$isSuccess = $categorieRepository->updateAuteur($id, $prenom, $nom);

if ($isSuccess) {
    header("Location: ../public/auteurs.php");
} else {
    header("Location: ../public/add-auteur.php?error=database-failed");
}


?>