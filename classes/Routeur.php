<?php

class Routeur {
    private $request;
    private $routes = [
                            "home.html"             => ["controller" => "Home", "method" => "showHomePage"],
                            "inscription.html"      => ["controller" => "Home", "method" => "showInscriptionPage"],
                            "connexion.html"        => ["controller" => "Home", "method" => "showConnexionPage"],
                            "inscrit.html"          => ["controller" => "Home", "method" => "ajoutClient"],
                            "connectAdmin.html"     => ["controller" => "Home", "method" => "AdminConnect"],
                            "locaCliPage.html"      => ["controller" => "Home", "method" => "showLocaCliPage"],
                            "connect.html"          => ["controller" => "Home", "method" => "connectClient"],
                            "adminPage.html"        => ["controller" => "Home", "method" => "showAdminPage"],
                            "cliPage.html"          => ["controller" => "Home", "method" => "showCliPage"],
                            "panierPage.html"       => ["controller" => "Home", "method" => "showPanierPage"],
                            "achatForm.html"        => ["controller" => "Home", "method" => "showAchatFormPage"],
                            "dispoVehi.html"        => ["controller" => "Home", "method" => "disponibiliteVehi"],
                            "delVehi.html"          => ["controller" => "Home", "method" => "delVehi"],
                            "facturePage.html"      => ["controller" => "Home", "method" => "showFactureCli"],
                            "ajoutVehiPage.html"    => ["controller" => "Home", "method" => "showAjoutVehiPage"],
                            "ajoutVehi.html"        => ["controller" => "Home", "method" => "ajoutVehi"],
                            "delCliPage.html"       => ["controller" => "Home", "method" => "showDelCliPage"],
                            "delCli.html"           => ["controller" => "Home", "method" => "delCli"],
                            "achat.html"            => ["controller" => "Home", "method" => "achatVehi"],
                            "ajoutPanier.html"      => ["controller" => "Home", "method" => "ajoutPanier"]
                        ];

    public function __construct($request){
        $this->request = $request;
    }
    
    public function getRoute(){
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams(){
        $params = null;

        $elements = explode('/', $this->request);
        unset($elements[0]);

        for($i = 1; $i<count($elements); $i++)
        {
            $params[$elements[$i]] = $elements[$i+1];
            $i++;
        }

        if($_POST){
            foreach($_POST as $key => $val){
                $params[$key] = $val;
            }
        }

        return $params;
    }

    public function renderController(){
        $route = $this->getRoute();
        $params = $this->getParams();

        
        if(key_exists($route, $this->routes)){
            $controller = $this->routes[$route]['controller'];
            $method     = $this->routes[$route]['method'];
            
            $currentController = new $controller();
            $currentController->$method($params);
            
        }else{
            $myView = new View('Error');
            $myView->render();
        }
    }
}

?>