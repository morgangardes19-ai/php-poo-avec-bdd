<?php
require_once "../utils/autoloader.php";
require_once "../utils/db_connect.php";

$auteurRepository = new AuteurRepository($db);
$auteurs = $auteurRepository->findAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>CRUD des auteurs</h1>
    <a href="./add-auteur.php">Ajouter un auteur</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /** @var Auteur $auteur */
            foreach ($auteurs as $auteur): ?>
                <tr>
                    <td><?= htmlspecialchars($auteur->getId()) ?></td>
                    <td><?= htmlspecialchars($auteur->getPrenom()) ?></td>
                    <td><?= htmlspecialchars($auteur->getNom()) ?></td>
                    <td>
                        <a href="../public/update-auteur.php?id=<?= $auteur->getId() ?>">Modifier</a>
                    </td>
                    <td>
                        <form action="../process/delete-auteur.php" method="post">
                            <label for="id"></label>
                            <input type="hidden" id="id" name="id" value="<?= $auteur->getId() ?>">
                            <button type="submit">Supprimer</button>
                    </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>