<?php
    //recuperer le infos du formulaire
    $nom 	= 	isset($_POST['nom']) ? $_POST['nom'] : NULL;
    $mdp 	= 	isset($_POST['mdp']) ? $_POST['mdp'] : NULL;
    $email = 	isset($_POST['email']) ? $_POST['email'] : NULL;

    class Identification {
        private $_identifiant;
        private $_nom;
        private $_motdepasse;
        private $_email;

        //Constructeur $nom, $mdp, $email
        public function __construct()
        {
            $this->_identifiant = null;
            $this->_nom = $nom;
            $this->_motdepasse = $mdp;
            $this->_email = $email;
        }


        //Ajouter Client
        function ajoutClient() {
            try{
                
                $ajout = new Modele();
                $req = $ajout->getBdd()->prepare("INSERT INTO `client` (`identifiant`, `nom`, `motdepasse`, `email`)
                                                VALUES (:id, :nom, :mdp, :email) ");
            
                $id = null;
                $req->bindParam(":id", $this->_identifiant);
                $req->bindParam(":nom", $this->_nom);
                $req->bindParam(":mdp", $this->_motdepasse);
                $req->bindParam(":email", $this->_email);
                $req->execute();
            
            }catch(Exception $e){
                $errorMes = $e->getMessage();
                //require_once("vue/vueError.php");
                $vue = new Vue('Error');
                $vue->generate(array("errorMes"=>$errorMes));
            }
        }
    
        private function verifNom(){
            try{
                $ajout = new Modele();
                $req = $ajout->getBdd()->prepare("SELECT * FROM `client` WHERE nom=:nom ");
            
                $this->_vue = new Vue('Inscription');
                $req->bindParam(':nom', $this->_nom);
                $execute = $req->execute();
            
                if($execute){
                    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
                }
            
                if(count($resultat) == 0) {
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                $errorMes = $e->getMessage();
            
                $vue = new Vue('Error');
                $vue->generate(array("errorMes"=>$errorMes));
            }
        }
    
        private function verifMail(){
        
            try{
                $ajout = new Modele();
                $req = $ajout->getBdd()->prepare("SELECT * FROM `client` WHERE email=:email ");
            
                $req->bindParam(':email', $this->_email);
                $execute = $req->execute();
            
                if($execute){
                    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
                }
            
                if(count($resultat) == 0) {
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                $errorMes = $e->getMessage();
            
                $vue = new Vue('Error');
                $vue->generate(array("errorMes"=>$errorMes));
            }
        }
    }
?>

