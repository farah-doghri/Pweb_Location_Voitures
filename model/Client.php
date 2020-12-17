<?php

class Client {
    private $idCli;
    private $nomCli;
    private $emailCli;
    private $telCli;
    private $mdpCli;
    private $listeVehi;
    private $listePanier;

    public function getIdCli(){
        return $this->idCli;
    }
    public function setIdCli($idCli){
        $this->idCli = $idCli;
    }

    public function getNomCli(){
        return $this->nomCli;
    }
    public function setNomCli($nomCli){
        $this->nomCli = $nomCli;
    }

    public function getEmailCli(){
        return $this->emailCli;
    }
    public function setEmailCli($emailCli){
        $this->emailCli = $emailCli;
    }

    public function getTelCli(){
        return $this->telCli;
    }
    public function setTelCli($telCli){
        $this->telCli = $telCli;
    }

    public function getMdpCli(){
        return $this->mdpCli;
    }
    public function setMdpCli($mdpCli){
        $this->mdpCli = $mdpCli;
    }

    public function getListeVehi(){
        return $this->listeVehi;
    }
    public function setListeVehi($listeVehi){
        $this->listeVehi = $listeVehi;
    }

    public function geListePanier(){
        return $this->listePanier;
    }
    public function setListePanier($listePanier){
        $this->listePanier = $listePanier;
    }
}

?>