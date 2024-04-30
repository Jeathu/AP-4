<?php

class Appartement {
    private $id;
    private $nom_appart;
    private $adresse;
    private $code_postal;
    private $ville;
    private $etage;
    private $typappart;
    private $prix_loc;
    private $prix_charg;
    private $ascenseur;
    private $date_libre;
    private $id_locataire_1;
    private $id_proprietaire;


    // Méthodes setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setNomAppart($nom_appart) {
        $this->nom_appart = $nom_appart;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setCodePostal($code_postal) {
        $this->code_postal = $code_postal;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setEtage($etage) {
        $this->etage = $etage;
    }

    public function setTypAppart($typappart) {
        $this->typappart = $typappart;
    }

    public function setPrixLoc($prix_loc) {
        $this->prix_loc = $prix_loc;
    }

    public function setPrixCharg($prix_charg) {
        $this->prix_charg = $prix_charg;
    }

    public function setAscenseur($ascenseur) {
        $this->ascenseur = $ascenseur;
    }

    public function setDateLibre($date_libre) {
        $this->date_libre = $date_libre;
    }

    public function setIdLocataire1($id_locataire_1) {
        $this->id_locataire_1 = $id_locataire_1;
    }

    public function setIdProprietaire($id_proprietaire) {
        $this->id_proprietaire = $id_proprietaire;
    }



    // Méthodes getter
    public function getId() {
        return $this->id;
    }

    public function getNomAppart() {
        return $this->nom_appart;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCodePostal() {
        return $this->code_postal;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getEtage() {
        return $this->etage;
    }

    public function getTypAppart() {
        return $this->typappart;
    }

    public function getPrixLoc() {
        return $this->prix_loc;
    }

    public function getPrixCharg() {
        return $this->prix_charg;
    }

    public function getAscenseur() {
        return $this->ascenseur;
    }

    public function getDateLibre() {
        return $this->date_libre;
    }

    public function getIdLocataire1() {
        return $this->id_locataire_1;
    }

    public function getIdProprietaire() {
        return $this->id_proprietaire;
    }
}

?>
