<?php

class Home {

    public $idCliConnect; 

    public function showHomePage($params){
        $manager = new VoitureManager();


        if(isset($nomVehi)) {
            $voitures = $manager->findAll($nomVehi);
        }else{
            $voitures = $manager->findAll($params['values']['motcle']);
        }
        
        $myView = new View('home');
        $myView->render(array('voitures' => $voitures));
    }
    
    public function showAdminPage($params){
        $manager = new VoitureManager();

        if(isset($nomVehi)) {
            $voitures = $manager->findAll($nomVehi);
        }else{
            $voitures = $manager->findAll($params['values']['motcle']);
        }

        $myView = new View('adminPage');
        $myView->render(array('voitures' => $voitures));
    }

    public function showCliPage($params){
        extract($params);
        $manager = new VoitureManager();
        
        if(isset($nomVehi)) {
            $voitures = $manager->findAll($nomVehi);
        }else if(isset($params["id"])){
            $voitures = $manager->findAll();
        }else{
            $voitures = $manager->findAll($params['values']['motcle']);
        }

        $myView = new View('cliPage');
        $myView->render(array('voitures' => $voitures, 'idCliConnect' => $params["id"]));
    }

    public function showInscriptionPage(){
        $manager = new ClientManager();
        $client = $manager->findAll();
        
        $myView = new View('inscription');
        $myView->render(array('client' => $client));
    }

    public function showConnexionPage(){
        $manager = new ClientManager();
        $client = $manager->findAll();

        $myView = new View('connexion');
        $myView->render(array('client' => $client));
    }

    public function showLocaCliPage($params){
        extract($params);

        $manager = new ClientManager();
        
        $clientVoiture = $manager->findClientVehi($id);      

        $myView = new View('locaCliPage');
        $myView->render(array('clientVoiture' => $clientVoiture));
    }

    public function showFactureCli($params){
        extract($params);

        $manager = new ClientManager();
        
        $clientVoiture = $manager->findClientVehi($id);      
        $prixMax = $manager->findPrixMax($clientVoiture);

        $myView = new View('facturePage');
        $myView->render(array('clientVoiture' => $clientVoiture, 'prixTotal' => $prixMax));
    }

    public function showPanierPage($params){
        extract($params);

        $manager = new ClientManager();
        
        $clientVoiture = $manager->findClientPanier($id);      

        $myView = new View('panierPage');
        $myView->render(array('clientVoiture' => $clientVoiture, 'idCliConnect' => $id));
    }

    public function showAchatFormPage($params){
        extract($params);

        $manager = new ClientManager();
        //$manager = new ClientManager();
        //$client = $manager->findID($id);
        $clientVoiture = $manager->findAll($id);      

        $myView = new View('achatForm');
        $myView->render(array('clientVoiture' => $clientVoiture, 'idCliConnect' => $id));
    }
    
    public function ajoutPanier($params){
        extract($params);

        $manager = new ClientManager();
        //$elements[0] = idVehi | $elements[1] = idCli
        $elements = explode('_', $params['id']);

        
        $manager->ajoutVehiPanier($elements);
        
        $manager = new VoitureManager();
        $voitures = $manager->findAll();   

        $myView = new View('cliPage');
        $myView->render(array('voitures' => $voitures, 'idCliConnect' => $elements[1]));
    }
    
    public function achatVehi($params){
        extract($params);

        $manager = new ClientManager();

        $manager->achatVehi($id);
        
        $manager = new VoitureManager();
        $voitures = $manager->findAll();   

        $myView = new View('cliPage');
        $myView->render(array('voitures' => $voitures, 'idCliConnect' => $id));
    }

    public function ajoutClient(){
        $values = $_POST['values'];
        $manager = new ClientManager();
        $manager->create($values);

        $client = $manager->find($values['mdp'], $values['nom']);
        $idCliConnect = $client->getIdCli();

        $manager = new VoitureManager();
        $voitures = $manager->findAll();

        
        $myView = new View('cliPage');
        $myView->render(array('voitures' => $voitures, 'idCliConnect' => $idCliConnect));
    }

    public function ajoutVehi(){
        $values = $_POST['values'];
        
        $manager = new VoitureManager();
        $manager->create($values);

        $voitures = $manager->findAll();
        $myView = new View('adminPage');
        $myView->render(array('voitures' => $voitures));
    }

    public function connectClient($params){
        extract($params);
        $values = $_POST['values'];

        $manager = new ClientManager();

        if(count($values) == 2){
            $values["role"] = "neutre";
        }
        

        if($values["role"] == "loueur"){
            $client = $manager->find($values['mdp'], $values['nom']);
            $idCliConnect = $client->getIdCli();

            if($client->getMdpCli() == null){
                $manager = new ClientManager();
                $client = $manager->findAll();

                $myView = new View('connexion');
                $myView->render(array('client' => $client));
            }else{
                $manager = new VoitureManager();
                $voitures = $manager->findAll();

                $myView = new View('cliPage');
                $myView->render(array('voitures' => $voitures, 'idCliConnect' => $idCliConnect));
            }
        }else if($values["role"] == "bailleur"){
            $client = $manager->findAdmin($values['mdp'], $values['nom']);
            
            if($client->getMdpCli() == null){
                $manager = new ClientManager();
                $client = $manager->findAll();

                $myView = new View('connexion');
                $myView->render(array('client' => $client));
            }else{
                $manager = new VoitureManager();
                $voitures = $manager->findAll();

                $this->idCliConnect = $client->getIdCli();

                $myView = new View('adminPage');
                $myView->render(array('voitures' => $voitures));
            }
        }else{
            $myView = new View('connexion');
            $myView->render();
        }
        
    }

    public function AdminConnect(){
        $values = $_POST['values'];

        $manager = new ClientManager();
        $client = $manager->findAdmin($values['mdpEntr'], $values['nomEntr']);
        
        if($client->getIdCli() == null){
            $manager = new ClientManager();
            $client = $manager->findAll();

            $myView = new View('connexion');
            $myView->render(array('client' => $client));
        }else{
            $manager = new VoitureManager();
            $voitures = $manager->findAll();

            $this->idCliConnect = $client->getIdCli();

            $myView = new View('adminPage');
            $myView->render(array('voitures' => $voitures));
        }
        
    }

    public function delVehi($params){
        extract($params);
        
        $manager = new VoitureManager();
        $manager->delete($id);

        $myView = new View();
        $myView->redirect('adminPage.html');
    }

    public function delCli($params){
        extract($params);
        
        $manager = new ClientManager();
        $manager->delete($id);
        
        $clients = $manager->findAll();

        $myView = new View('delCli');
        $myView->render(array('clients' => $clients));
    }

    public function showDelCliPage($params){
        $manager = new ClientManager();
        
        $clients = $manager->findAll();

        $myView = new View('delCli');
        $myView->render(array('clients' => $clients));
    }

    public function showAjoutVehiPage(){
        $manager = new VoitureManager();
        $voitures = $manager->findAll();

        $myView = new View('ajoutVehi');
        $myView->render(array('voitures' => $voitures));
    }

    public function disponibiliteVehi($params){
        extract($params);

        $manager = new VoitureManager();
        $manager->dispoVehi($id);

        $myView = new View();
        $myView->redirect('adminPage.html');
    }

    public function verifCarte($values){
        if (!empty($values["nomCarte"]) && !empty($values["numCarte"]) && 
            !empty($values["dateCarte"]) && !empty($values["codeCarte"])
            ){
                return true;
            }else{
                return false;
            }
    }
}

?>