<?php 
    require_once("vue/Vue.php");
    
    class ControleConnexion{
        private $_articleManager;
        private $_vue;
        
        public function __construct($url){
            
            if(isset($url) && count($url) > 1){
                throw new Exception("Page introuvable");
            }
            else{
                $this->client();
            }
        }

        private function client(){
            $this->_articleManager = new ArticleManager();
            $client = $this->_articleManager->getClient();

            //require_once("vue/VueConnexion.php");
            $this->_vue = new Vue('Connexion');
            $this->_vue->generate(array("client"=>$client));
        }
    }
?>