<?php 
// SECURITE
 if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("Location: ../public/categories.php?error=bad-method");
    exit();
 }
 if (!isset($_POST['id'])) {
    header("Location: ../public/categories.php?error=missing-value");
    exit();
 }
 if (empty($_POST['id'])) {
    header("Location: ../public/categories.php?error=empty-value");
    exit();
 }

//  INPUT SANITIZATION
$id = (int) $_POST["id"];

require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

$categorieRepository = new CategorieRepository($db);
$isSuccess = $categorieRepository->delete($id);

if ($isSuccess) {
    header("Location: ../public/categories.php");
} else {
    header("Location: ../public/categories.php?error=database-failed");
}

?>