<?php

class DemandeDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create( Photo_appart  $photo_appart) {
        $stmt = $this->pdo->prepare("INSERT INTO photo_appartement (url_photo,description) VALUES (?, ?)");
        $stmt->execute([
            $photo_appart->url_photo,
            $photo_appart->description
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getById( Photo_appart  $id_appart) {
        $stmt = $this->pdo->prepare("SELECT * FROM demandes WHERE id = ?");
        $stmt->execute([
            $id_appart->$id_appart
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ajoutez d'autres méthodes pour la mise à jour, la suppression, la récupération de toutes les demandes, etc.
}
?>
