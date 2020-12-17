<?php 
//Contient les methodes communes au class

    class Modele{
        private static $_bdd;

        //Initialise la connection avec la BD
        private static function setBdd(){
            self::$_bdd = new PDO("mysql:   host=localhost;
                                            dbname=testlocation;
                                            charset=utf8", 
                                            "root", 
                                            "root");
            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }

        //Recupere la connection avec la BD
        public function getBdd(){
            if(self::$_bdd == null){
                $this->setBdd();
            }

            return self::$_bdd;
        }

        //Recuperer les elements de la table en parametre
        public function getAll($table, $obj){
            $var = [];
            $req = $this->getBdd()->prepare("SELECT * FROM ".$table." ORDER BY identifiant desc");
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC)){
                $var[] = new $obj($data);
            }
            
            //retourner les donnees de la table
            return $var;
            $req->closeCursor();
        }

    }

?>