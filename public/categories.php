<?php 
require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

// require_once "../src/Repositories/CategorieRepository.php";
// require_once "../src/Mappers/CategorieMapper.php";
// require_once "../src/Entities/Categorie.php";

$categorieRepository = new CategorieRepository($db);
$categories = $categorieRepository->findAll();
// var_dump($categories);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CRUD des categories</h1>
    <a href="./add-categorie.php">Ajouter une catégorie</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            /** @var Categorie $categorie */
            foreach ($categories as $categorie): ?>
                <tr>
                    <td><?= htmlspecialchars($categorie->getId()) ?></td>
                    <td><?= htmlspecialchars($categorie->getIntitule()) ?></td>
                    <td>
                        <a href="../public/update-categorie.php?id=<?= $categorie->getId() ?>">Modifier</a>
                        <a href="../process/delete-categorie.php?id=<?= $categorie->getId() ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>