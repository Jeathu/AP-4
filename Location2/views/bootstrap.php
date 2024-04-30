<!DOCTYPE html>
<html lang="en">
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
      <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">GSB</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link me-2" href="#">Chambre</a>
        </li>
         <li class="nav-item">
          <a class="nav-link me-2" href="#">Options</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModel">
        Login
        </button>
         <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registerModel">
        Register
        </button>
      </form>
    </div>
  </div>
</nav>



<!-- PAGE LOGIN -->
<div class="modal fade" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="index.php?action=login" method="post">
         <div class="modal-header">
         <h5 class="modal-title d-flex align-items-center">
           <i class="bi bi-person-circle fs-3 me-2"></i> Connectez-vous
         </h5>
         <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="mb-3">
            <label  class="form-label"  for="email">Adresse email</label>
            <input type="email" id="email" name="email" required class="form-control  shadow-none">
            </div>

            <div class="mb-4">
            <label  class="form-label" for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required class="form-control  shadow-none">
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <button  type="submit" value="Se connecter" class="btn btn-dark shadow-none">
                    Se connecter
                </button>
            </div>
         </div>
        </form>
    </div>
  </div>
</div>




<!-- PAGE REGISTER -->
<div class="modal fade" id="registerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form action="index.php?action=register" method="post">
         <div class="modal-header">
         <h5 class="modal-title d-flex align-items-center">
           <i class="bi bi-person-fill-add fs-3 me-2"></i> Inscrivez-vous
         </h5>
         <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label" for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" required class="form-control  shadow-none">
                    </div>
                    <div class="col-md-6 p-0">
                        <label  class="form-label" for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" required class="form-control  shadow-none">
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" required class="form-control  shadow-none">
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label"  for="tel">Numéro de téléphone</label>
                        <input type="number" id="tel" name="tel" class="form-control  shadow-none">
                    </div>
                    <div class="col-md-12 p-0 mb-3">
                        <label  class="form-label" for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control  shadow-none">
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label" for="code_postal">Code postal</label>
                        <input type="text" id="code_postal" name="code_postal" class="form-control  shadow-none">
                    </div>
                    <div class="col-md-6 p-0">
                        <label  class="form-label" for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" class="form-control  shadow-none">
                    </div>
                     <div class="col-md-6 ps-0 mb-3">
                        <label  class="form-label" for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required class="form-control  shadow-none">
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                       <label class="form-label" for="role">Rôle</label>
                       <select class="form-select shadow-none" id="role" name="role">
                          <option value="proprietaire">Propriétaire</option>
                          <option value="locataire">Locataire</option>
                       </select>
                    </div>
                    <div class="text-center my-1">
                      <button  type="submit" class="btn btn-dark shadow-none">
                         S'inscrire
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
    button{
        margin: 5px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
