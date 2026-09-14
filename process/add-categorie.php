
<?php

// var_dump($_POST);

// etape à faire ici : validation des donnée avec tous les if de verification du $_POST ainsi que le noettoyage des inputs
// bla bla bla les étapes de sécurité 

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