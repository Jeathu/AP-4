<?php

require_once 'config.php'; 
require_once 'Utilisateur.php';

class UtilisateurDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    // Méthode pour obtenir un utilisateur par son email pour login
    public function getByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->execute([
            'email' => $email
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Méthode pour créer un nouvel utilisateur
    public function create(Utilisateur $utilisateur) {
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (nom, prenom, adresse, code_postal, ville, tel, email, password, role) VALUES (:nom, :prenom, :adresse, :code_postal, :ville, :tel, :email, :password, :role)");
        try {
            $stmt->execute([
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'adresse' => $utilisateur->getAdresse(),
                'code_postal' => $utilisateur->getCodePostal(),
                'ville' => $utilisateur->getVille(),
                'tel' => $utilisateur->getTel(),
                'email' => $utilisateur->getEmail(),
                'password' => $utilisateur->getPassword(),
                'role' => $utilisateur->getRole()
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage());
        }
    }


    // Méthode pour mettre à jour un utilisateur ✅
    public function update(Utilisateur $utilisateur) {
        $stmt = $this->pdo->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, adresse = :adresse, code_postal = :code_postal, ville = :ville, tel = :tel, password = :password, role = :role WHERE email = :email");
        try {
            $stmt->execute([
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'adresse' => $utilisateur->getAdresse(),
                'code_postal' => $utilisateur->getCodePostal(),
                'ville' => $utilisateur->getVille(),
                'tel' => $utilisateur->getTel(),
                'password' => $utilisateur->getPassword(),
                'role' => $utilisateur->getRole(),
                'email' => $utilisateur->getEmail()
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage());
        }
    }


    // Méthode pour supprimer un utilisateur
    public function delete($email) {
        $stmt = $this->pdo->prepare("DELETE FROM utilisateurs WHERE email = :email");
        try {
            $stmt->execute(['email' => $email]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
        }
    }
}
?>
