<?php

class ClientManager{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projetpwebbd;charset=utf8", "root", "root");
    }

    public function findAll() {
        $bdd = $this->bdd;

        /* Acces a la BDD et ses elements */
        $query = "SELECT * FROM clients";
        
        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $client = new Client();

            $client->setIdCli($row['idCli']);
            $client->setNomCli($row['nomCli']);
            $client->setEmailCli($row['emailCli']);
            $client->setTelCli($row['telCli']);
            $client->setMdpCli($row['mdpCli']);
            $client->setListeVehi($row['listeVehi']);
            $client->setListePanier($row['listePanier']);

            $clients[] = $client;
        };

        return $clients;
    }

    public function findClientVehi($idCli) {
        $bdd = $this->bdd;

        /* Acces a la BDD et ses elements */
        $query = "SELECT listeVehi FROM clients WHERE idCli = $idCli";
        $req = $bdd->prepare($query);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        
        $listeIdVehi = explode('_', $row["listeVehi"]);
        unset($listeIdVehi[count($listeIdVehi)-1]);

        for($i = 0; $i < count( $listeIdVehi ); $i++){
            $queryVoiture = "SELECT * FROM vehicule WHERE idVehi = :idVehi";

            $reqVehi = $bdd->prepare($queryVoiture);
            $reqVehi->bindValue(':idVehi', $listeIdVehi[$i]);
            $reqVehi->execute();
            $rowVehi = $reqVehi->fetch(PDO::FETCH_ASSOC);
        
            $dateFac = null;

            $queryFac = "SELECT dateDeb, dateFin FROM facturation, vehicule WHERE facturation.idVehi = $rowVehi[idVehi]";
            $reqFac = $bdd->prepare($queryFac);
            $reqFac->execute();
    
            $dateFac = null;
    
            while ($rowFac = $reqFac->fetch(PDO::FETCH_ASSOC)) {
                $dateFac = "Debut ".$rowFac['dateDeb']." | Fin ".$rowFac['dateFin'];
            }
    
            if($dateFac == null){
                $dateFac = "Pas de location en cour";
            }
            $voiture = new Voiture();
    
            $voiture->setIdVehi($rowVehi['idVehi']);
            $voiture->setNomVehi($rowVehi['nomVehi']);
            $voiture->setTypeVehi($rowVehi['typeVehi']);
            $voiture->setCaractVehi($rowVehi['caractVehi']);
            $voiture->setLocaVehi($rowVehi['locaVehi']);
            $voiture->setPhotoVehi($rowVehi['photoVehi']);
            $voiture->setDateLocation($dateFac);
            $voiture->setPrixLoc($rowVehi['prixVehi']);

            $voitures[] = $voiture;
        }
        
        if($listeIdVehi == null){
            $myView = new View('Error');
            $myView->render(array('erreur' => "Pas de voiture enregistrée"));
            exit;
        }

        return $voitures;
    }

    public function findPrixMax($voitures){
        $prix = 0;

        foreach($voitures as $v){
            $prix += $v->getLocaVehi();
        }

        return $prix;
    }

    public function ajoutVehiPanier($values){
        /*** accès au model ***/
        $bdd = $this->bdd;
        
        $queryGetPanier = "SELECT listePanier FROM clients WHERE idCli = $values[1]";
        $reqGetPanier = $bdd->prepare($queryGetPanier);

        $reqGetPanier->execute();
        $row = $reqGetPanier->fetch(PDO::FETCH_ASSOC);

        $elements = explode('_', $row["listePanier"]);

        foreach ($elements as $idVehiPanier){
            if($idVehiPanier == $values[0]){
                $manager = new VoitureManager();
                $voitures = $manager->findAll();   

                $myView = new View('cliPage');
                $myView->render(array('voitures' => $voitures, 'idCliConnect' => $values[1]));
                exit;
            }
        }

        $query = "UPDATE clients SET listePanier = :listePanier WHERE idCli = $values[1]";

        $req = $bdd->prepare($query);

        $req->bindValue(':listePanier', $values[0]."_".$row["listePanier"]);

        $req->execute();
    }
    
    public function achatVehi($idCli){
        /*** accès au model ***/
        $bdd = $this->bdd;
        
        $queryGetPanier = "SELECT listePanier FROM clients WHERE idCli = $idCli";
        $reqGetPanier = $bdd->prepare($queryGetPanier);
        $reqGetPanier->execute();
        
        $rowPanier = $reqGetPanier->fetch(PDO::FETCH_ASSOC);
        $elementPanier = explode('_', $rowPanier["listePanier"]);
        
        
        $queryGetVehi = "SELECT listeVehi FROM clients WHERE idCli = $idCli";
        $reqGetVehi = $bdd->prepare($queryGetVehi);
        $reqGetVehi->execute();
        
        $rowVehi = $reqGetPanier->fetch(PDO::FETCH_ASSOC);
        $elementVehi = explode('_', $rowVehi["listeVehi"]);

        for($i = 0; $i < count($elementPanier); $i++){     
            for($y = 0; $y < count($elementVehi); $y++){
                if($elementVehi[$y] == $elementPanier[$i]){
                    unset($elementPanier[$i]);
                }
            }
        }


        $querySelect = "SELECT * FROM clients WHERE idCli = $idCli";

        $reqSelect = $bdd->prepare($querySelect);
        $reqSelect->execute();
        $row = $reqSelect->fetch(PDO::FETCH_ASSOC);

        $query = "UPDATE clients SET listeVehi = :listeVehi WHERE idCli = $idCli";
        $req = $bdd->prepare($query);
        
        $tab = "";
        foreach ($elementPanier as $idVehi){
            $tab = $idVehi."_".$tab;

            $queryFac = "INSERT INTO `facturation` (`idFac`, `idVehi`, `idCli`, `dateDeb`, `dateFin`, `valFac`) VALUES (Null, $idVehi, $idCli, '2020-11-01', '2020-12-01', '1500');";
            $reqFac = $bdd->prepare($queryFac);
            $reqFac->execute();
        }

        $req->bindValue(':listeVehi', $tab.$row["listeVehi"]);
        $req->execute();

        $querySuppr = "UPDATE clients SET listePanier = NULL WHERE idCli = $idCli";

        $reqSuppr = $bdd->prepare($querySuppr);
        $reqSuppr->execute();
        
        
    }

    public function findClientPanier($idCli) {
        $bdd = $this->bdd;

        /* Acces a la BDD et ses elements */
        $query = "SELECT listePanier FROM clients WHERE idCli = $idCli";
        $req = $bdd->prepare($query);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        
        $listeIdVehi = explode('_', $row["listePanier"]);
        unset($listeIdVehi[count($listeIdVehi)-1]);

        for($i = 0; $i < count($listeIdVehi); $i++){
            $queryVoiture = "SELECT * FROM vehicule WHERE idVehi = :idVehi";

            $reqVehi = $bdd->prepare($queryVoiture);
            $reqVehi->bindValue(':idVehi', $listeIdVehi[$i]);
            $reqVehi->execute();
            $rowVehi = $reqVehi->fetch(PDO::FETCH_ASSOC);
        
            $dateFac = null;

            $queryFac = "SELECT dateDeb, dateFin FROM facturation, vehicule WHERE facturation.idVehi = $rowVehi[idVehi]";
            $reqFac = $bdd->prepare($queryFac);
            $reqFac->execute();
    
            $dateFac = null;
    
            while ($rowFac = $reqFac->fetch(PDO::FETCH_ASSOC)) {
                $dateFac = "Debut ".$rowFac['dateDeb']." | Fin ".$rowFac['dateFin'];
            }
    
            if($dateFac == null){
                $dateFac = "Pas de location en cour";
            }
            $voiture = new Voiture();
    
            $voiture->setIdVehi($rowVehi['idVehi']);
            $voiture->setNomVehi($rowVehi['nomVehi']);
            $voiture->setTypeVehi($rowVehi['typeVehi']);
            $voiture->setCaractVehi($rowVehi['caractVehi']);
            $voiture->setLocaVehi($rowVehi['locaVehi']);
            $voiture->setPhotoVehi($rowVehi['photoVehi']);
            $voiture->setDateLocation($dateFac);
            $voiture->setPrixLoc($rowVehi['prixVehi']);

            $voitures[] = $voiture;
        }
        
        if($listeIdVehi == null){
            $myView = new View('Error');
            $myView->render(array('erreur' => "Pas de voiture dans le panier"));
            exit;
        }

        return $voitures;
    }

    public function find($mdpCli, $nomCli = null){
        $bdd = $this->bdd;

        /*** accès au model ***/
        $query = "SELECT * FROM clients WHERE mdpCli = :mdpCli AND nomCli = :nomCli";

        $req = $bdd->prepare($query);
        $req->bindValue(':mdpCli', $mdpCli);
        $req->bindValue(':nomCli', $nomCli);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $client = new Client();

        $client->setIdCli($row['idCli']);
        $client->setNomCli($row['nomCli']);
        $client->setEmailCli($row['emailCli']);
        $client->setTelCli($row['telCli']);
        $client->setMdpCli($row['mdpCli']);
        $client->setListeVehi($row['listeVehi']);
        $client->setListePanier($row['listePanier']);

        return $client;
    }

    public function findID($idCli){
        $bdd = $this->bdd;

        /*** accès au model ***/
        $query = "SELECT * FROM clients WHERE idCli = :idCli";

        $req = $bdd->prepare($query);
        $req->bindValue(':idCli', $idCli);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $client = new Client();

        $client->setIdCli($row['idCli']);
        $client->setNomCli($row['nomCli']);
        $client->setEmailCli($row['emailCli']);
        $client->setTelCli($row['telCli']);
        $client->setMdpCli($row['mdpCli']);
        $client->setListeVehi($row['listeVehi']);
        $client->setListePanier($row['listePanier']);

        return $client;
    }
    
    public function findAdmin($mdpEntr, $nomEntr){
        $bdd = $this->bdd;

        /*** accès au model ***/
        $query = "SELECT * FROM entreprise WHERE mdpEntr = :mdpEntr AND nomEntr = :nomEntr";

        $req = $bdd->prepare($query);
        $req->bindValue(':mdpEntr', $mdpEntr, PDO::PARAM_INT);
        $req->bindValue(':nomEntr', $nomEntr);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $client = new Client();

        $client->setIdCli($row['idEntr']);
        $client->setNomCli($row['nomEntr']);
        $client->setEmailCli($row['emailEntr']);
        $client->setMdpCli($row['mdpEntr']);

        return $client;
    }

    public function create($values){
        /*** accès au model ***/
        $bdd = $this->bdd;
        
        if( !$this->verifNom($values['nom']) && !$this->verifEmail($values['email']) && 
            !$this->verifTelCli($values['tel']) && !empty($values['nom']) && 
            !empty($values['email']) && !empty($values['tel']) && !empty($values['mdp']) ) 
            
            {
                $query = "INSERT INTO clients (idCli, nomCli, emailCli, telCli, mdpCli) 
                VALUES (NULL, :nomCli, :emailCli, :telCli, :mdpCli)";

                $req = $bdd->prepare($query);

                $req->bindValue(':nomCli', $values['nom']);
                $req->bindValue(':emailCli', $values['email']);
                $req->bindValue(':telCli', $values['tel']);
                $req->bindValue(':mdpCli', $values['mdp']);

                
                $req->execute();
            }
            else{
                $myView = new View();
                $myView->redirect('inscription.html');
            }  
    }

    public function delete($idCli){

        /*** accès au model ***/
        $bdd = $this->bdd;
        $query = "DELETE FROM clients WHERE idCli = :idCli";

        $req = $bdd->prepare($query);
        $req->bindValue(':idCli', $idCli, PDO::PARAM_INT);

        $req->execute();
    }

    function verifNom($nomCli) {
		/*** accès au model ***/
        $bdd = $this->bdd;

		//selectionner le nom
		$query="SELECT * FROM clients WHERE nomCli = :nomCli ";
		
		//verifie si le nom existe
		try {
			$req = $bdd->prepare($query);
			$req->bindValue(':nomCli', $nomCli, PDO::PARAM_INT);
			$bool = $req->execute();
			if ($bool) {
				$resultat = $req->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select nom Ajout Client : " . $e->getMessage() . "\n");
		}		

		
		if(count($resultat) == 0) return false;
		else return true;
	}

	function verifEmail($emailCli) {
		/*** accès au model ***/
        $bdd = $this->bdd;

		//selectionner le nom
		$query="SELECT * FROM clients WHERE emailCli = :emailCli ";
		
		//verifie si le nom existe
		try {
			$req = $bdd->prepare($query);
			$req->bindValue(':emailCli', $emailCli, PDO::PARAM_INT);
			$bool = $req->execute();
			if ($bool) {
				$resultat = $req->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select email Ajout Client : " . $e->getMessage() . "\n");
		}		

		
		if(count($resultat) == 0) return false;
		else return true;
    }
    
    function verifTelCli($telCli) {
		/*** accès au model ***/
        $bdd = $this->bdd;

		//selectionner le nom
		$query="SELECT * FROM clients WHERE telCli = :telCli ";
		
		//verifie si le nom existe
		try {
			$req = $bdd->prepare($query);
			$req->bindValue(':telCli', $telCli, PDO::PARAM_INT);
			$bool = $req->execute();
			if ($bool) {
				$resultat = $req->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select telCli verif Client : " . $e->getMessage() . "\n");
		}		
		
		if(count($resultat) == 0) return false;
		else return true;
    }
    
    
}

?>