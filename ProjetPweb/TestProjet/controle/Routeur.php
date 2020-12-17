<?php

require_once("vue/Vue.php");

//Changer de page
class Routeur{
    private $_ctrl;
    private $_vue;

    //Gestion de requette selon l'action du user
    public function routeReq(){
        try{
            //Chargement auto des classes du fichiers modeles
            spl_autoload_register(function($class){
                require_once("modele/".$class.".php");
            });

            $url = '';

            
            //Inclusion du ficher selon l'action du user
            if(isset($_GET['url'])){
                //recuperer les param de l'URL de maniere separer et les securise avec FILTER_SANITIZE_URL
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                

                //recuperer le 1er param de l'url (1er lettre en maj et le reste en min)
                $controleur = ucfirst(strtolower($url[0]));
                $controleurClass = "Controle".$controleur;//recuperer le nom du fichier
                $controleurFile = "controle/".$controleurClass.".php";//recuperer le chemin complet
                
                //verifie si le fichier controleur exist et inclus ce controlleur
                if(file_exists($controleurFile)){
                    require_once($controleurFile);//Requerir le fichier
                    $this->_ctrl = new $controleurClass($url);//stocker le controleur dans this
                    //$this->_ctrl = new ControlleurAccueil($url);//stocker le controleur dans this
                }else{
                    throw new Exception("Page introuvable");
                }
            }else{
                require_once("controle/ControleAccueil.php");
                $this->_ctrl = new ControleAccueil($url);
            }
        }catch(Exception $e){
            $errorMes = $e->getMessage();
            //require_once("vue/vueError.php");
            $this->_vue = new Vue('Error');
            $this->_vue->generate(array("errorMes"=>$errorMes));
        }
    }
}

?>