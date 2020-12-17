<?php 

    class Vehicule{
        private $_identifiant;
        private $_type;
        private $_caracteristique;
        private $_location;
        private $_photo;

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
        public function setType($type){
            if(is_string($type)){
                $this->_type = $type;
            }
        }
        public function setCaracteristique($caracteristique){
            if(is_string($caracteristique)){
                $this->_caracteristique = $caracteristique;
            }
        }
        public function setLocation($location){
            if(is_string($location)){
                $this->_location = $location;
            }
        }
        public function setPhoto($photo){
            if(is_string($photo)){
                $this->_photo = $photo;
            }
        }
    
        //Getteur
        public function identifiant(){
            return $this->_identifiant;
        }
        public function type(){
            return $this->_type;
        }
        public function Caracteristique(){
            return $this->_caracteristique;
        }
        public function location(){
            return $this->_location;
        }
        public function photo(){
            return $this->_photo;
        }


    }

?>