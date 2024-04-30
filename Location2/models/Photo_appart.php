<?php

class  Photo_appart {

    public $id_photo;
    public $url_photo;
    public $description;


    // Méthodes Getter 
    public function getId_appart() {
        return $this->id_photo;
    }
    public function getUrl_photo() {
        return $this->url_photo;
    }
    public function getDescription() {
        return $this->description;
    }


    // Méthodes Setter 
    public function setId_appart($id_photo) {
        $this->id_photo = $id_photo;
    }
    public function setUrl_photo($url_photo) {
        $this->url_photo = $url_photo;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

}
