<?php
require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

$id = $_GET['id'];

$categorieRepository = new CategorieRepository($db);
$categorie = $categorieRepository->findById($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../process/update-categorie.php" method="post">

        <input type="hidden" name="id" value="<?= $categorie->getId() ?>">

        <input type="text" name="intitule" value="<?= htmlspecialchars($categorie->getIntitule()) ?>">

        <button type="submit">Modifier</button>

    </form>
</body>

</html>