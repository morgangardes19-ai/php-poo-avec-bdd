<?php
require_once "../utils/autoloader.php";


$id = $_GET['id'];
$categories = $categorieRepository->update();
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