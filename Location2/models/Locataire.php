<?php

class Locataire extends Utilisateur {

    public $date_naissance;
    public $rib;

    public function __construct($nom, $prenom, $adresse, $code_postal, $ville, $tel, $email, $password, $role, $date_naissance, $rib) {
        parent::__construct($nom, $prenom, $adresse, $code_postal, $ville, $tel, $email, $password, $role);
        $this->date_naissance = $date_naissance;
        $this->rib = $rib;
    }

    // Getter pour date_naissance
    public function getDateNaissance() {
        return $this->date_naissance;
    }

    // Setter pour date_naissance
    public function setDateNaissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }

    // Getter pour rib
    public function getRib() {
        return $this->rib;
    }

    // Setter pour rib
    public function setRib($rib) {
        $this->rib = $rib;
    }
}

?>
