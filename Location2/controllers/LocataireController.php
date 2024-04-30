<?php

require_once 'config.php';
require_once 'Utilisateur.php';
require_once 'UtilisateurDAO.php';
require_once 'LocataireDAO.php';

class LocataireController {

    private $locataireDAO;

    public function __construct(LocataireDAO $locataireDAO) {
        $this->locataireDAO = $locataireDAO;
    }

    // Méthode pour créer un nouveau locataire
    public function createLocataire($id_utilisateur, $date_naissance, $r_i_b) {
        $locataire = new Locataire();
        $locataire->setIdUtilisateur($id_utilisateur);
        $locataire->setDateNaissance($date_naissance);
        $locataire->setRib($r_i_b);

        try {
            $locataireId = $this->locataireDAO->create($locataire);
            return $locataireId;
        } catch (Exception $e) {
            // Gérer l'erreur
            return null;
        }
    }

    // Méthode pour mettre à jour un locataire
    public function updateLocataire($id_utilisateur, $date_naissance, $r_i_b) {
        $locataire = new Locataire();
        $locataire->setIdUtilisateur($id_utilisateur);
        $locataire->setDateNaissance($date_naissance);
        $locataire->setRib($r_i_b);

        try {
            $locataireUpdated = $this->locataireDAO->update($locataire);
            return $locataireUpdated;
        } catch (Exception $e) {
            // Gérer l'erreur
            return false;
        }
    }

    // Méthode pour supprimer un locataire
    public function deleteLocataire($id) {
        try {
            $locataireDeleted = $this->locataireDAO->delete($id);
            return $locataireDeleted;
        } catch (Exception $e) {
            // Gérer l'erreur
            return false;
        }
    }
}

?>
