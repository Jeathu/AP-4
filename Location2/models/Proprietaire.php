<?php

class Proprietaire extends Utilisateur {

    public $tel_banque;

    public function __construct($nom, $prenom, $adresse, $code_postal, $ville, $tel, $email, $password, $role, $tel_banque) {
        parent::__construct($nom, $prenom, $adresse, $code_postal, $ville, $tel, $email, $password, $role);
        $this->tel_banque = $tel_banque;
    }

    // Getter pour tel_banque
    public function getTelBanque() {
        return $this->tel_banque;
    }

    // Setter pour tel_banque
    public function setTelBanque($tel_banque) {
        $this->tel_banque = $tel_banque;
    }
}

?>
