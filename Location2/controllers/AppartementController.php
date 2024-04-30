<?php

require_once 'config.php';
require_once 'models/AppartementDAO.php';

class AppartementController {

    private $appartementDAO;

    public function __construct(AppartementDAO $appartementDAO) {
        $this->appartementDAO = $appartementDAO;
    }

    // Méthode pour créer un nouvel appartement
    public function createAppartement($nom_appart, $adresse, $code_postal, $ville, $etage, $typappart, $prix_loc, $prix_charg, $ascenseur, $date_libre, $id_proprietaire) {
        $appartement = new Appartement();
        $appartement->setNomAppart($nom_appart);
        $appartement->setAdresse($adresse);
        $appartement->setCodePostal($code_postal);
        $appartement->setVille($ville);
        $appartement->setEtage($etage);
        $appartement->setTypAppart($typappart);
        $appartement->setPrixLoc($prix_loc);
        $appartement->setPrixCharg($prix_charg);
        $appartement->setAscenseur($ascenseur);
        $appartement->setDateLibre($date_libre);
        $appartement->setIdProprietaire($id_proprietaire);

        try {
            $appartementId = $this->appartementDAO->create($appartement);
            return $appartementId;
        } catch (Exception $e) {
            // Gérer l'erreur
            return null;
        }
    }

    // Méthode pour mettre à jour un appartement
    public function updateAppartement($id, $adresse, $code_postal, $ville, $etage, $typappart, $prix_loc, $prix_charg, $ascenseur, $date_libre) {
        $appartement = new Appartement();
        $appartement->setId($id);
        $appartement->setAdresse($adresse);
        $appartement->setCodePostal($code_postal);
        $appartement->setVille($ville);
        $appartement->setEtage($etage);
        $appartement->setTypAppart($typappart);
        $appartement->setPrixLoc($prix_loc);
        $appartement->setPrixCharg($prix_charg);
        $appartement->setAscenseur($ascenseur);
        $appartement->setDateLibre($date_libre);

        try {
            $appartementUpdated = $this->appartementDAO->update($appartement);
            return $appartementUpdated;
        } catch (Exception $e) {
            // Gérer l'erreur
            return false;
        }
    }

    // Méthode pour supprimer un appartement
    public function deleteAppartement($id) {
        try {
            $appartementDeleted = $this->appartementDAO->delete($id);
            return $appartementDeleted;
        } catch (Exception $e) {
            // Gérer l'erreur
            return false;
        }
    }

    // Méthode pour afficher tous les appartements
    public function showAllAppartements() {
        try {
            $appartements = $this->appartementDAO->getAll();
            // Inclure la vue pour afficher tous les appartements
            include 'views/appartements.php';
        } catch (Exception $e) {
            // Gérer l'erreur
        }
    }

    // Méthode pour afficher les détails d'un appartement
    public function showAppartementDetails($id) {
        try {
            $appartement = $this->appartementDAO->getById($id);
            // Inclure la vue pour afficher les détails de l'appartement
            include 'views/appartement_details.php';
        } catch (Exception $e) {
            // Gérer l'erreur
        }
    }
}

?>
