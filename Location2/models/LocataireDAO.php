<?php

require_once 'locataire.php';

class LocataireDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create( Locataire $locataire) {
        $stmt = $this->pdo->prepare("INSERT INTO locataires (nom, prenom, adresse, code_postal, ville, tel, email, password, telle_banque, date_naiss, rib) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $locataire->nom, 
            $locataire->prenom, 
            $locataire->adresse, 
            $locataire->code_postal, 
            $locataire->ville, 
            $locataire->tel, 
            $locataire->email, 
            $locataire->password, 
            $locataire->telle_banque, 
            $locataire->date_naiss, 
            $locataire->rib
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM locataires WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ajoutez d'autres méthodes pour la mise à jour, la suppression, la récupération de tous les locataires, etc.
}
?>
