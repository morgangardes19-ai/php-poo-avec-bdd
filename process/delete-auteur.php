<?php 
// SECURITE
 if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("Location: ../public/auteurs.php?error=bad-method");
    exit();
 }
 if (!isset($_POST['id'])) {
    header("Location: ../public/auteurs.php?error=missing-value");
    exit();
 }
 if (empty($_POST['id'])) {
    header("Location: ../public/auteurs.php?error=empty-value");
    exit();
 }

//  INPUT SANITIZATION
$id = (int) $_POST["id"];

require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

$categorieRepository = new AuteurRepository($db);
$isSuccess = $categorieRepository->deleteAuteur($id);

if ($isSuccess) {
    header("Location: ../public/auteurs.php");
} else {
    header("Location: ../public/auteurs.php?error=database-failed");
}

?>