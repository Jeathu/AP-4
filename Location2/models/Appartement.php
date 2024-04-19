<?php

class Appartement {

    public $id;
    public $nom_appart;
    public $adresse;
    public $code_postal;
    public $ville;
    public $etage;
    public $typappart;
    public $prix_loc;
    public $prix_charg;
    public $ascenseur;
    public $date_libre;




    // Méthodes Getter
    public  function getId() {
        return $this->id;
    }
    public  function getNomAppart() {
        return $this->nom_appart;
    }
    public  function getAdresse() {
        return $this->adresse;
    }
    public   function getCodePostal() {
        return $this->code_postal;
    }
    public   function getVille() {
        return $this->ville;
    }
    public  function getEtage() {
        return $this->etage;
    }
    public  function getTypappart() {
        return $this->typappart;
    }
    public  function getPrix_loc() {
        return $this->prix_loc;
    }
    public   function getPrix_charg() {
        return $this->preavis;
    }
    public  function getAscenseur() {
        return $this->ascenseur;
    }
    public  function getDateLibre() {
        return $this->date_libre;
    }


    // Méthodes Setter 
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
    public function setTypappart($typappart) {
        $this->typappart = $typappart;
    }
    public function setPrix($prix_loc) {
        $this->prix_loc = $prix_loc;
    }
    public function setPreavis($prix_charg) {
        $this->prix_charg = $prix_charg;
    }
    public function setAscenseur($ascenseur) {
        $this->ascenseur = $ascenseur;
    }
    public function setDateLibre($date_libre) {
        $this->date_libre = $date_libre;
    }
}
