<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des appartements</title>
</head>
<body>
    <h1>Liste des appartements</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom de l'appartement</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Prix de location</th>
            <th>Action</th>
        </tr>
        <?php foreach ($appartements as $appartement) : ?>
            <tr>
                <td><?php echo $appartement['id']; ?></td>
                <td><?php echo $appartement['nom_appart']; ?></td>
                <td><?php echo $appartement['adresse']; ?></td>
                <td><?php echo $appartement['ville']; ?></td>
                <td><?php echo $appartement['prix_loc']; ?></td>
                <td><a href="index.php?action=details&id=<?php echo $appartement['id']; ?>">Détails</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
