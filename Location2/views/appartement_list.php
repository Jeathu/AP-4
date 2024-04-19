<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Appartements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Liste des Appartements</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Prix</th>
                <th>Date Libre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appartements as $appartement): ?>
                <tr>
                    <td><?php echo $appartement['nom_appart']; ?></td>
                    <td><?php echo $appartement['adresse']; ?></td>
                    <td><?php echo $appartement['ville']; ?></td>
                    <td><?php echo $appartement['prix_loc']; ?></td>
                    <td><?php echo $appartement['date_libre']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
