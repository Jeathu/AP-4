<?php

require_once 'Visiter.php';

class VisiterDAO {

    private $pdo;

    // Constructeur de la classe VisiterDAO
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Méthode pour insérer une visite dans la base de données.
     *
     * @param Visiter $visite L'objet Visiter à insérer.
     * @return bool Vrai si l'insertion a réussi, faux sinon.
     */
    public function insererVisite(Visiter $visite) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO visite (num_loc, num_dem, date_visite) VALUES (:num_loc, :num_dem, :date_visite)");
            $stmt->execute([
                ':num_loc' => $visite->getNumLoc(),
                ':num_dem' => $visite->getNumDem(),
                ':date_visite' => $visite->getDateVisite()
            ]);
            return true; // Retourne vrai si l'insertion est réussie
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion de la visite : " . $e->getMessage();
            return false; // Retourne faux en cas d'erreur
        }
    }

    /**
     * Méthode pour récupérer toutes les visites dans la base de données.
     *
     * @return array|bool Un tableau contenant toutes les visites, ou false si une erreur s'est produite.
     */
    public function getToutesVisites() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM visite");
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne un tableau contenant toutes les visites
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des visites : " . $e->getMessage();
            return false; // Retourne faux en cas d'erreur
        }
    }
}

?>
