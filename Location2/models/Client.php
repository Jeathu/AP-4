<?php

class Client extends Utilisateur {

    // Aucune propriété spécifique pour la classe Client, car elle hérite déjà des propriétés de la classe Utilisateur

    public function __construct($nom, $prenom, $adresse, $code_postal, $ville, $tel, $email, $password, $role) {
        parent::__construct($nom, $prenom, $adresse, $code_postal, $ville, $tel, $email, $password, $role);
    }
}

?>
