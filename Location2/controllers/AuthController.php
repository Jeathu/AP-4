<?php

require_once 'models/UtilisateurDAO.php';


class AuthController {

    private $utilisateurDAO;

    public function __construct(UtilisateurDAO $utilisateurDAO) {
        $this->utilisateurDAO = $utilisateurDAO;
    }

    public function register(Utilisateur $utilisateur) {

     // Vérifie si l'adresse email est déjà utilisée
     if ($this->utilisateurDAO->getByEmail($utilisateur->getEmail())) {
        $_SESSION['error_message'] = 'Cette adresse email est déjà utilisée.';
        header('Location: ./views/404.php'); // Redirige vers la page d'erreur
        exit();
     }

     // Hashage du mot de passe
     $hashedPassword = password_hash($utilisateur->getPassword(), PASSWORD_DEFAULT);
     $utilisateur->setPassword($hashedPassword);

     // Création de l'utilisateur dans la base de données
     $this->utilisateurDAO->create($utilisateur);

     $_SESSION['success_message'] = 'Votre compte a été créé avec succès. Veuillez vous connecter.';
     header('Location: ./views/bootstrap.php'); // Redirige vers la page de connexion avec un message de succès
     exit();
    }


    /*
    public function login($email, $password) {
        $utilisateur = $this->utilisateurDAO->getByEmail($email);

        // Vérifie si l'utilisateur existe et si le mot de passe est correct
        if ($utilisateur && password_verify($password, $utilisateur['password'])) {
            // Authentification réussie, redirige vers la page d'accueil ou autre page sécurisée
            header('Location: ./views/accueil.php');
            exit();
        } else {
            // Authentification échouée, affiche un message d'erreur sur la page de connexion
            $_SESSION['error_message'] = 'Adresse email ou mot de passe incorrect.';
            header('Location: ./views/bootstrap.php');
            exit();
        }
    }
  */

  public function login($email, $password) {
    $utilisateur = $this->utilisateurDAO->getByEmail($email);

    // Vérifie si l'utilisateur existe et si le mot de passe est correct
    if ($utilisateur && password_verify($password, $utilisateur['password'])) {
        // Authentification réussie
        // Vérifie le rôle de l'utilisateur
        if ($utilisateur['role'] === 'proprietaire') {
            // Redirection vers le formulaire pour les propriétaires
            header('Location: ./views/formulaire_appart_propri.php');
            exit();
        } elseif ($utilisateur['role'] === 'locataire') {
            // Redirection vers la page d'accueil pour les locateurs
            header('Location: ./views/accueil.php');
            exit();
        }
    } else {
        // Authentification échouée, affiche un message d'erreur sur la page de connexion
        session_start(); // Démarrage de la session
        $_SESSION['error_message'] = 'Adresse email ou mot de passe incorrect.';
        header('Location: ./views/bootstrap.php');
        exit();
    }
   }



    public function logout() {
        unset($_SESSION['utilisateur']);
        header('Location: ./views/bootstrap.php');
        exit();
    }
}
?>
