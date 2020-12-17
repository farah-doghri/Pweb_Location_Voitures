<?php

class Voiture {
    private $idVehi;
    private $nomVehi;
    private $typeVehi;
    private $caractVehi;
    private $locaVehi;
    private $photoVehi;
    private $DateLocation;
    private $prixLoc;

    public function getIdVehi(){
        return $this->idVehi;
    }
    public function setIdVehi($idVehi){
        $this->idVehi = $idVehi;
    }

    public function getNomVehi(){
        return $this->nomVehi;
    }
    public function setNomVehi($nomVehi){
        $this->nomVehi = $nomVehi;
    }

    public function getTypeVehi(){
        return $this->typeVehi;
    }
    public function setTypeVehi($typeVehi){
        $this->typeVehi = $typeVehi;
    }

    public function getCaractVehi(){
        $carac = json_decode($this->caractVehi);
        return $carac;
    }
    public function setCaractVehi($caractVehi){
        $this->caractVehi = $caractVehi;
    }

    public function getLocaVehi(){
        return $this->locaVehi;
    }
    public function setLocaVehi($locaVehi){
        $this->locaVehi = $locaVehi;
    }

    public function getPhotoVehi(){
        return $this->photoVehi;
    }
    public function setPhotoVehi($photoVehi){
        $this->photoVehi = $photoVehi;
    }

    public function getDateLocation(){
        return $this->DateLocation;
    }
    public function setDateLocation($DateLocation){
        $this->DateLocation = $DateLocation;
    }

    public function getPrixLoc(){
        return $this->prixLoc;
    }
    public function setPrixLoc($prixLoc){
        $this->prixLoc = $prixLoc;
    }
}

?>