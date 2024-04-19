<?php

require_once 'models/ProprietaireDAO.php'; // Inclure le DAO pour Proprietaire

class ProprietaireController {

    // Méthode pour créer un propriétaire
    public function createProprietaire($nom, $prenom, $adresse, $code_postal, $ville, $tel, $email, $password, $tel_banque, $roleUtilisateur) {
        // Vérifier le rôle de l'utilisateur
        if ($roleUtilisateur !== 'proprietaire') {
            // Gérer l'erreur d'autorisation ici, par exemple, renvoyer une exception
            throw new Exception("Erreur : Vous n'avez pas les autorisations nécessaires pour créer un propriétaire.");
        }

        // Créer un nouvel objet Proprietaire
        $proprietaire = new Proprietaire();
        // Définir les propriétés du propriétaire
        $proprietaire->setNom($nom);
        $proprietaire->setPrenom($prenom);
        $proprietaire->setAdresse($adresse);
        $proprietaire->setCodePostal($code_postal);
        $proprietaire->setVille($ville);
        $proprietaire->setTel($tel);
        $proprietaire->setEmail($email);
        $proprietaire->setPassword($password);
        $proprietaire->setTelBanque($tel_banque);

        // Créer une instance du DAO ProprietaireDAO
        $proprietaireDAO = new ProprietaireDAO();
        // Appeler la méthode create du DAO pour insérer le propriétaire dans la base de données
        $proprietaireId = $proprietaireDAO->create($proprietaire);

        // Retourner l'ID du propriétaire créé
        return $proprietaireId;
    }


    // Méthode pour récupérer un propriétaire par son ID
    public function getProprietaireById($id, $roleUtilisateur) {
        // Vérifier le rôle de l'utilisateur
        if ($roleUtilisateur !== 'proprietaire') {
            // Gérer l'erreur d'autorisation ici, par exemple, renvoyer une exception
            throw new Exception("Erreur : Vous n'avez pas les autorisations nécessaires pour accéder à ces informations.");
        }

        // Créer une instance du DAO ProprietaireDAO
        $proprietaireDAO = new ProprietaireDAO();
        // Appeler la méthode getById du DAO pour récupérer le propriétaire par son ID
        $proprietaire = $proprietaireDAO->getById($id);

        // Retourner le propriétaire récupéré
        return $proprietaire;
    }
}

?>
