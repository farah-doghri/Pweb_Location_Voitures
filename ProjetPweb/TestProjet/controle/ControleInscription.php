<?php 
    require_once("vue/Vue.php");
    require_once("controle/Identification.php");
    
    

    echo $nom." ".$mdp." ".$email."\n";
    class ControleInscription{
        private $_articleManager;
        private $_vue;
        private $_ajout;
        private $_valideIdent = false;


        public function __construct($url){
            
            if(isset($url) && count($url) > 1){
                throw new Exception("Page introuvable");
            }
            else{
                $this->identification();
            }
        }

        private function identification(){
            $this->_articleManager = new ArticleManager();
            $client = $this->_articleManager->getClient();

            $client->setN
            //$this->_ajout = new Identification($nom, $mdp, $email);

            $this->_vue = new Vue('Inscription');
            $this->_vue->generate(array("client"=>$client));
        }
    }
?>