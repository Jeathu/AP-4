<?php

require_once 'config.php';
require_once 'Proprietaire.php';

class ProprietaireDAO extends UtilisateurDAO {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour créer un nouveau propriétaire
    public function create(Proprietaire $proprietaire) {
        $stmt = $this->pdo->prepare("INSERT INTO proprietaire (tel_banque, id_utilisateur) VALUES (:tel_banque, :id_utilisateur)");
        try {
            $stmt->execute([
                'tel_banque' => $proprietaire->getTelBanque(),
                'id_utilisateur' => $proprietaire->getIdUtilisateur()
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'insertion du propriétaire : " . $e->getMessage());
        }
    }

    // Méthode pour mettre à jour un propriétaire
    public function update(Proprietaire $proprietaire) {
        $stmt = $this->pdo->prepare("UPDATE proprietaire SET tel_banque = :tel_banque WHERE id_utilisateur = :id_utilisateur");
        try {
            $stmt->execute([
                'tel_banque' => $proprietaire->getTelBanque(),
                'id_utilisateur' => $proprietaire->getIdUtilisateur()
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour du propriétaire : " . $e->getMessage());
        }
    }

    // Méthode pour supprimer un propriétaire
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM proprietaire WHERE id = :id");
        try {
            $stmt->execute(['id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression du propriétaire : " . $e->getMessage());
        }
    }
}

?>
