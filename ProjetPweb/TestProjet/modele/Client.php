<?php 

    class Client{
        private $_identifiant;
        private $_nom;
        private $_motdepasse;
        private $_email;

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
        public function setNom($nom){
            if(is_string($nom)){
                $this->_nom = $nom;
            }
        }
        public function setMotDePasse($motdepasse){
            if(is_string($motdepasse)){
                $this->_motdepasse = $motdepasse;
            }
        }
        public function setEmail($email){
            if(is_string($email)){
                $this->_email = $email;
            }
        }

        //Getteur
        public function identifiant(){
            return $this->_identifiant;
        }
        public function nom(){
            return $this->_nom;
        }
        public function motdepasse(){
            return $this->_motdepasse;
        }
        public function email(){
            return $this->_email;
        }

    }

?>