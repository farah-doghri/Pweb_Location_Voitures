<?php

    class ArticleManager extends Modele{
        public function getVehicule(){
            return $this->getAll("vehicule", "Vehicule");
        }

        public function getFacture(){
            return $this->getAll("facturation", "Facture");
        }
        
        public function getClient(){
            return $this->getAll("client", "Client");
        }

    }

?>