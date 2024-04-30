<?php

require_once 'Appartement.php'; 
require_once 'config.php'; 

class AppartementDAO {

    private $pdo;

    // Constructeur de la classe AppartementDAO
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour récupérer un appartement par son ID
    public function getById($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM appartement WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération de l'appartement : " . $e->getMessage());
        }
    }

    // Méthode pour créer un appartement dans la base de données
    public function create(Appartement $appartement) {
        $stmt = $this->pdo->prepare("INSERT INTO appartement (nom_appart, adresse, code_postal, ville, etage, typappart, prix_loc, prix_charg, ascenseur, date_libre, id_proprietaire) 
                      VALUES (:nom_appart, :adresse, :code_postal, :ville, :etage, :typappart, :prix_loc, :prix_charg, :ascenseur, :date_libre, :id_proprietaire)");
        try {
            $stmt->execute([
                'nom_appart' => $appartement->getNomAppart(),
                'adresse' => $appartement->getAdresse(),
                'code_postal' => $appartement->getCodePostal(),
                'ville' => $appartement->getVille(),
                'etage' => $appartement->getEtage(),
                'typappart' => $appartement->getTypAppart(), // Correction ici
                'prix_loc' => $appartement->getPrixLoc(),
                'prix_charg' => $appartement->getPrixCharg(),
                'ascenseur' => $appartement->getAscenseur(),
                'date_libre' => $appartement->getDateLibre(),
                'id_proprietaire' => $appartement->getIdProprietaire()
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la création de l'appartement : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer tous les appartements depuis la base de données
    public function getAll() {
        $query = "SELECT * FROM appartement";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer les appartements d'un propriétaire
    public function getByOwner($ownerId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM appartement WHERE id_proprietaire = :ownerId");
            $stmt->execute([':ownerId' => $ownerId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des appartements du propriétaire : " . $e->getMessage());
        }
    }

    // Méthode pour mettre à jour les informations d'un appartement
    public function update(Appartement $appartement) {
        $stmt = $this->pdo->prepare("UPDATE appartement SET adresse = :adresse, code_postal = :code_postal, ville = :ville, etage = :etage, typappart = :typappart, prix_loc = :prix_loc, prix_charg = :prix_charg, ascenseur = :ascenseur, date_libre = :date_libre WHERE id = :id");
        try {
            $stmt->execute([
                'adresse' => $appartement->getAdresse(),
                'code_postal' => $appartement->getCodePostal(),
                'ville' => $appartement->getVille(),
                'etage' => $appartement->getEtage(),
                'typappart' => $appartement->getTypAppart(), // Correction ici
                'prix_loc' => $appartement->getPrixLoc(),
                'prix_charg' => $appartement->getPrixCharg(),
                'ascenseur' => $appartement->getAscenseur(),
                'date_libre' => $appartement->getDateLibre(),
                'id' => $appartement->getId()
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la mise à jour de l'appartement : " . $e->getMessage());
        }
    }

    // Méthode pour supprimer un appartement
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM appartement WHERE id = :id");
        try {
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression de l'appartement : " . $e->getMessage());
        }
    }
}

?>
