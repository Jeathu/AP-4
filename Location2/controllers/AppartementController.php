<?php

require_once 'models/AppartementDAO.php';

class AppartementController {

    private $appartementDAO;

    public function __construct(AppartementDAO $appartementDAO) {
        $this->appartementDAO = $appartementDAO;
    }

    public function listApartment() {
        try {
            // Récupérer tous les appartements
            $appartements = $this->appartementDAO->getAll();
            // Afficher la vue avec la liste des appartements
            $this->renderView('appartement_list.php', ['appartements' => $appartements]);
        } catch (Exception $e) {
            // En cas d'erreur, afficher une vue d'erreur
            $this->renderError('Une erreur est survenue lors de la récupération de la liste des appartements : ' . $e->getMessage());
        }
    }

    public function addApartment($ownerId, $appartementName) {
        try {
            // Créer un nouvel objet Appartement
            $appartement = new Appartement();
            $appartement->setProprietaireId($ownerId);
            $appartement->setNomAppart($appartementName);
            // Ajouter l'appartement à la base de données
            $this->appartementDAO->createApartment($appartement);
            // Rediriger l'utilisateur vers la liste des appartements
            $this->listApartments();
        } catch (Exception $e) {
            // En cas d'erreur, afficher une vue d'erreur
            $this->renderError('Une erreur est survenue lors de l\'ajout de l\'appartement : ' . $e->getMessage());
        }
    }

    public function listOwnerApartments($ownerId) {
        try {
            // Récupérer les appartements du propriétaire spécifié
            $appartements = $this->appartementDAO->getByOwner($ownerId);
            // Afficher la vue avec la liste des appartements du propriétaire
            $this->renderView('owner_appartement_list.php', ['appartements' => $appartements]);
        } catch (Exception $e) {
            // En cas d'erreur, afficher une vue d'erreur
            $this->renderError('Une erreur est survenue lors de la récupération de la liste des appartements du propriétaire : ' . $e->getMessage());
        }
    }

    private function renderView($view, $data = []) {
        extract($data);
        include 'views/' . $view;
    }

    private function renderError($message) {
        include 'views/error.php';
    }
}

?>
