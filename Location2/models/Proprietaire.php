<?php

// Définition de la classe Proprietaire héritant de Utilisateur
class Proprietaire extends Utilisateur {

    // Propriété supplémentaire pour Proprietaire
    public $tel_banque;

    // Méthode Getter pour tel_banque
    public function getTelBanque() {
        return $this->tel_banque;
    }

    // Méthode Setter pour tel_banque
    public function setTelBanque($tel_banque) {
        $this->tel_banque = $tel_banque;
    }
}
