<?php

class Visiter {

    public $num_loc;
    public $num_dem;
    public $date_visite;



    // Méthodes Getter
    public function getNumLoc() {
        return $this->num_loc;
    }
    public function getNumDem() {
        return $this->num_dem;
    }
    public function getDateVisite() {
        return $this->date_visite;
    }



    // Méthodes Setter 
    public function setNumLoc($num_loc) {
        $this->num_loc = $num_loc;
    }
    public function setNumDem($num_dem) {
        $this->num_dem = $num_dem;
    }
    public function setDateVisite($date_visite) {
        $this->date_visite = $date_visite;
    }
}

?>
