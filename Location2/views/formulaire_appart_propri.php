<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>GSB</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-white px-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <form class="d-flex" role="search">
        <button type="button" class="btn btn-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#appartModel">
          Créer
        </button>
      </form>
    </div>
  </div>
</nav>

<div class="modal fade" id="appartModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <form action="router.php?action=addApartment" method="post">
         <div class="modal-header">
         <h5 class="modal-title d-flex align-items-center">
           <i class="bi bi-building-fill-add fs-3 me-2"></i> Créer votre appartement
         </h5>
         <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="nom_appart">Nom</label>
                        <input type="text" id="nom_appart" name="nom_appart" required class="form-control shadow-none">
                    </div>
                    <div class="col-md-12 p-0 mb-3">
                        <label class="form-label" for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control shadow-none">
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="code_postal">Code postal</label>
                        <input type="text" id="code_postal" name="code_postal" class="form-control shadow-none">
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label" for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" class="form-control shadow-none">
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label" for="etage">Étage</label>
                        <input type="number" id="etage" name="etage" class="form-control shadow-none">
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label" for="typappart">Type d'appartement</label>
                        <input type="text" id="typappart" name="typappart" class="form-control shadow-none">
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label" for="prix_loc">Prix</label>
                        <input type="number" id="prix_loc" name="prix_loc" class="form-control shadow-none">
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label" for="prix_charg">Prix de charge</label>
                        <input type="number" id="prix_charg" name="prix_charg" class="form-control shadow-none"></input>
                    </div>
                    <div class="form-check form-switch">
                      <label class="form-check-label" for="ascenseur">Ascenseur</label>
                      <input type="checkbox" role="switch" id="ascenseur" name="ascenseur" class="form-check-input" >
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label" for="date_libre">Date libre</label>
                        <input type="date" id="date_libre" name="date_libre" class="form-control shadow-none"></input>
                    </div>

                    <div class="text-center my-1">
                      <button type="submit" class="btn btn-dark shadow-none">
                         Créer
                      </button>
                    </div>
                </div>
            </div>
         </div>
        </form>
        
    </div>
  </div>
</div>


<style>
    button {
        margin: 5px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
