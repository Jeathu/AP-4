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

    
    default:
        include 'views/bootstrap.php'; // Inclure la vue par défaut
    break;
}
