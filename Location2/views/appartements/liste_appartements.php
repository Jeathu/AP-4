<!-- app/views/liste_appartements.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des appartements</title>
</head>
<body>
    <h1>Liste des appartements</h1>
    <ul>
        <?php foreach ($appartements as $appartement): ?>
            <li>
                <strong>Nom :</strong> <?php echo $appartement['nom_appart']; ?><br>
                <strong>Adresse :</strong> <?php echo $appartement['adresse']; ?><br>
                <strong>Ville :</strong> <?php echo $appartement['ville']; ?><br>
                <!-- Afficher d'autres informations d'appartement si nécessaire -->
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
