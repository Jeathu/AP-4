<?php

require_once 'Visite.php';

class VisiteDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create( Visiter $visiteur) {
        $stmt = $this->pdo->prepare("INSERT INTO visiter (num_loc, num_dem, date_visite) VALUES (?, ?, ?)");
        $stmt->execute([
            $visiteur->num_loc, 
            $visiteur->num_dem, 
            $visiteur->date_visite
        ]);
        return $this->pdo->lastInsertId();
    }

    // Ajoutez d'autres méthodes pour la mise à jour, la suppression, la récupération des relations visiter, etc.
}

?>
