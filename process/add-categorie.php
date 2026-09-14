
<?php

// var_dump($_POST);

// etape à faire ici : validation des donnée avec tous les if de verification du $_POST ainsi que le noettoyage des inputs
// bla bla bla les étapes de sécurité 

 if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("Location: ../public/index.php?error=bad-method");
    exit();
 }
 if (!isset($_POST['intitule'])) {
    header("Location: ../public/index.php?error=missing-value");
    exit();
 }
 if (empty($_POST['intitule'])) {
    header("Location: ../public/index.php?error=empty-value");
    exit();
 }

// INPUT SANITIZATION
$intitule = htmlspecialchars(trim($_POST["intitule"]));

// var_dump($intitule);

// si les données sont juste et sécurisé, on veut mettre en BDD puis rediriger
require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

$categorieRepository = new CategorieRepository($db);
$isSuccess = $categorieRepository->insert($intitule);

if ($isSuccess) {
    header("Location: ../public/categories.php");
} else {
    header("Location: ../public/add-categorie.php?error=database-failed");
}


?>