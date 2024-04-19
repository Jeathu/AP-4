<?php

class Locataire {

    public $id;
    public $nom;
    public $prenom;
    public $adresse;
    public $code_postal;
    public $ville;
    public $tel;
    public $email;
    public $password;
    public $telle_banque;
    public $date_naiss;
    public $rib;




    // Méthodes Getter 
    public function getId() {
        return $this->id;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
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
    public function getTel() {
        return $this->tel;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getTelleBanque() {
        return $this->telle_banque;
    }
    public function getDateNaiss() {
        return $this->date_naiss;
    }
    public function getRib() {
        return $this->rib;
    }





    // Méthodes Setter
    public function setId($id) {
        $this->id = $id;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
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
    public function setTel($tel) {
        $this->tel = $tel;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setTelleBanque($telle_banque) {
        $this->telle_banque = $telle_banque;
    }
    public function setDateNaiss($date_naiss) {
        $this->date_naiss = $date_naiss;
    }
    public function setRib($rib) {
        $this->rib = $rib;
    }
}

?>
