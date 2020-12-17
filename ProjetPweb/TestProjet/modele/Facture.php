<?php 

    class Facture{
        private $_identifiant;
        private $_idClient;
        private $_idVehicule;
        private $_dateDebutFacture;
        private $_dateFinFacture;
        private $_valeur;
        private $_etat;

        //Constructeur
        public function __construct(array $data)
        {
            $this->hydrate($data);

        }

        //renvoie au setter de maniere securisa
        public function hydrate(array $data){
            foreach($data as $key => $value ){
                $method = "set".ucfirst($key);

                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }

        
        //Setteur
        public function setIdentifiant($identifiant){
            $identifiant = (int) $identifiant;
            if($identifiant > 0){
                $this->_identifiant = $identifiant;
            }
        }
        public function setID($idClient){
            $idClient = (int) $idClient;
            if($idClient > 0){
                $this->_idClient = $idClient;
            }
        }
        public function setIdVehicule($idVehicule){
            $idVehicule = (int) $idVehicule;
            if($idVehicule > 0){
                $this->_idVehicule = $idVehicule;
            }
        }
        public function setDateDebutFacture($dateDebutFacture){
            $this->_dateDebutFacture = $dateDebutFacture;
        }
        public function setDateFinFacture($dateFinFacture){
            $this->_dateFinFacture = $dateFinFacture;
        }
        public function setValeur($valeur){
            $valeur = (int) $valeur;
            if($valeur > 0){
                $this->valeur = $valeur;
            }
        }
        public function setEtat($etat){
            if(is_string($etat)){
                $this->_etat = $etat;
            }
        }
    
        //Getteur
        public function identifiant(){
            return $this->_identifiant;
        }
        public function idClient(){
            return $this->_idClient;
        }
        public function idVehicule(){
            return $this->_idVehicule;
        }
        public function dateDebutFacture(){
            return $this->_dateDebutFacture;
        }
        public function dateFinFacture(){
            return $this->_dateFinFacture;
        }
        public function valeur(){
            return $this->_valeur;
        }
        public function etat(){
            return $this->_etat;
        }
    }
?>