<?php

// Inclure les fichiers nécessaires
require_once 'config.php'; // Inclure le fichier de configuration de la base de données
require_once 'models/UtilisateurDAO.php'; // Inclure la classe UtilisateurDAO pour la gestion des utilisateurs en base de données
require_once 'controllers/AuthController.php'; // Inclure le contrôleur pour l'authentification des utilisateurs
require_once 'controllers/AppartementController.php'; // Inclure le contrôleur pour gérer les actions liées aux appartements
require_once 'models/AppartementDAO.php'; // Inclure la classe AppartementDAO pour la gestion des appartements en base de données

// Initialiser l'objet UtilisateurDAO avec la connexion à la base de données
$utilisateurDAO = new UtilisateurDAO($db);

// Initialiser l'objet AuthController avec UtilisateurDAO pour gérer les actions liées à l'authentification
$userController = new AuthController($utilisateurDAO);

$appartementDAO = new AppartementDAO($db);
$appartementController = new AppartementController($appartementDAO);


// Définir l'action à effectuer, 'bootstrap' étant la page par défaut
$action = isset($_GET['action']) ? $_GET['action'] : 'bootstrap';

// Gérer les différentes actions en fonction de l'action spécifiée dans l'URL
switch ($action) {
    case 'register':
        // Vérifier si la méthode de requête est POST pour l'inscription d'un nouvel utilisateur
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Créer un nouvel utilisateur avec les données du formulaire et l'enregistrer
            $utilisateur = new Utilisateur();
            $utilisateur->setNom($_POST['nom']);
            $utilisateur->setPrenom($_POST['prenom']);
            $utilisateur->setEmail($_POST['email']);
            $utilisateur->setPassword($_POST['password']);
            $utilisateur->setAdresse($_POST['adresse']);
            $utilisateur->setCodePostal($_POST['code_postal']);
            $utilisateur->setVille($_POST['ville']);
            $utilisateur->setTel($_POST['tel']);
            $utilisateur->setRole($_POST['role']);
            $userController->register($utilisateur); // Appeler la méthode de registration dans le contrôleur
        } else {
            include './views/404.php'; // Inclure la vue d'inscription par défaut
        }
        break;

    case 'login':
    // Vérifier si la méthode de requête est POST pour la connexion d'un utilisateur
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $loginResult = $userController->login($email, $password); // Appeler la méthode de connexion dans le contrôleur
        if ($loginResult) {
            // Redirection vers la page d'accueil après une connexion réussie
            header('Location: /views/accueil.php');
            exit();
        } else {
            // Si l'authentification échoue, inclure la vue de connexion avec un message d'erreur
            include 'views/bootstrap.php';
        }
    } else {
        // Si la méthode de requête n'est pas POST, inclure la vue de connexion par défaut
        include 'views/bootstrap.php';
    }
    break;


   case 'create_appartement':
        // Vérifier si la méthode de requête est POST pour la création d'un nouvel appartement
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Créer un nouvel appartement avec les données du formulaire et l'enregistrer
            $appartement = new Appartement();
            // Récupérer les données du formulaire et les assigner à l'objet appartement
            $appartement->setNomAppart($_POST['nom_appart']);
            $appartement->setAdresse($_POST['adresse']);
            $appartement->setCodePostal($_POST['code_postal']);
            $appartement->setVille($_POST['ville']);
            $appartement->setEtage($_POST['etage']);
            $appartement->setTypAppart($_POST['typappart']);
            $appartement->setPrixLoc($_POST['prix_loc']);
            $appartement->setPrixCharg($_POST['prix_charg']);
            $appartement->setAscenseur($_POST['ascenseur']);
            $appartement->setDateLibre($_POST['date_libre']);
            $appartement->setIdProprietaire($_POST['id_proprietaire']);
            $appartementController->createAppartement($appartement); // Appeler la méthode de création dans le contrôleur
        } else {
            include './views/404.php'; // Inclure la vue d'erreur 404
        }
    break;


    case 'edit_appartement':
        // Vérifier si la méthode de requête est POST pour la mise à jour d'un appartement
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Créer un objet appartement avec les données du formulaire
            $appartement = new Appartement();
            // Récupérer les données du formulaire et les assigner à l'objet appartement
            $appartement->setId($_POST['id']); // ID de l'appartement à mettre à jour
            // Assigner les autres attributs de l'appartement à mettre à jour
            $appartement->setAdresse($_POST['adresse']);
            $appartement->setCodePostal($_POST['code_postal']);
            $appartement->setVille($_POST['ville']);
            $appartement->setEtage($_POST['etage']);
            $appartement->setTypAppart($_POST['typappart']);
            $appartement->setPrixLoc($_POST['prix_loc']);
            $appartement->setPrixCharg($_POST['prix_charg']);
            $appartement->setAscenseur($_POST['ascenseur']);
            $appartement->setDateLibre($_POST['date_libre']);
            $appartementController->updateAppartement($appartement); // Appeler la méthode de mise à jour dans le contrôleur
        } else {
            include './views/404.php'; // Inclure la vue d'erreur 404
        }
    break;


    case 'delete_appartement':
        // Vérifier si l'ID de l'appartement à supprimer est spécifié dans l'URL
        if (isset($_GET['id'])) {
            $appartementId = $_GET['id'];
            $appartementController->deleteAppartement($appartementId); // Appeler la méthode de suppression dans le contrôleur
        } else {
            include './views/404.php'; // Inclure la vue d'erreur 404
        }
    break;

    case 'list_appartements':
        // Afficher la liste des appartements
        $appartementController->showAllAppartements();
    break;

    case 'details_appartement':
        // Vérifier si l'ID de l'appartement à afficher est spécifié dans l'URL
        if (isset($_GET['id'])) {
            $appartementId = $_GET['id'];
            $appartementController->showAppartementDetails($appartementId); // Appeler la méthode pour afficher les détails de l'appartement dans le contrôleur
        } else {
            include './views/404.php'; // Inclure la vue d'erreur 404
        }
    break;


    default:
        include 'views/bootstrap.php'; // Inclure la vue par défaut
        break;
}
