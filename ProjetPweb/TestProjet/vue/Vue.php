<?php 
    class Vue{
        private $_file;
        private $_t;

        public function __construct($action){
            $this->_file = "vue/vue".$action.".php";
        }
        
        //Genere et affiche la vue
        public function generate($data){
            //Partie spécifique de la vue
            $content = $this->generateFile($this->_file, $data);

            //template
            $vue = $this->generateFile("vue/template.php", array('t'=>$this->_t, "content"=>$content));

            echo $vue;
        }

        //Generer un fichier vue et renvoie le résultat produit
        private function generateFile($file, $data){
            if(file_exists($file)){
                extract($data);

                ob_start();

                //inclusion du fichier vue
                require $file;

                return ob_get_clean();
            }else{
                throw new Exception("Fichier ".$file." introuvable");
            }
        }
    }

?>