<?php 
    require_once("vue/Vue.php");
    
    class ControleAccueil{
        private $_articleManager;
        private $_vue;
        
        public function __construct($url){
            
            if(isset($url) && count($url) > 1){
                throw new Exception("Page introuvable");
            }
            else{
                $this->vehicule();
            }
        }

        private function vehicule(){
            $this->_articleManager = new ArticleManager();
            $vehicule = $this->_articleManager->getVehicule();

            //require_once("vue/VueAccueil.php");
            $this->_vue = new Vue('Accueil');
            $this->_vue->generate(array("vehicule"=>$vehicule));
        }
    }
?>