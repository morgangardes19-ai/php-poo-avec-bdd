<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter un auteur</h1>
    <form action="../process/add-auteur.php" method="post">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">

        <button type="submit">Créer</button>
    </form>
</body>
</html>