<?php

class VoitureManager{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projetpwebbd;charset=utf8", "root", "root");
    }

    public function findAll($nomVehi=null) {
        $bdd = $this->bdd;

        /* Acces a la BDD et ses elements */
        if(isset($nomVehi)){
            $query = "SELECT * FROM vehicule WHERE nomVehi LIKE '%$nomVehi%'";
            
        }else{
            $query = "SELECT * FROM vehicule";
        }
        
        
        
        $req = $bdd->prepare($query);
        $req->execute();
        $nbr= $req->rowCount();

        if($nbr == 0){
            $query = "SELECT * FROM vehicule";
            $req = $bdd->prepare($query);
            $req->execute();
        }
        
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $queryFac = "SELECT dateDeb, dateFin FROM facturation, vehicule WHERE facturation.idVehi = $row[idVehi]";
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

            $voiture->setIdVehi($row['idVehi']);
            $voiture->setNomVehi($row['nomVehi']);
            $voiture->setTypeVehi($row['typeVehi']);
            $voiture->setCaractVehi($row['caractVehi']);
            $voiture->setLocaVehi($row['locaVehi']);
            $voiture->setPhotoVehi($row['photoVehi']);
            $voiture->setDateLocation($dateFac);
            $voiture->setPrixLoc($row['prixVehi']);
            
            $voitures[] = $voiture;
        };

        return $voitures;
    }

    public function find($idVehi){
        $bdd = $this->bdd;

        /*** accès au model ***/
        $query = "SELECT * FROM vehicule WHERE idVehi = :idVehi";

        $req = $bdd->prepare($query);
        $req->bindValue(':idVehi', $idVehi, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $queryFac = "SELECT dateDeb, dateFin FROM facturation, vehicule WHERE facturation.idVehi = $row[idVehi]";
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

        $voiture->setIdVehi($row['idVehi']);
        $voiture->setNomVehi($row['nomVehi']);
        $voiture->setTypeVehi($row['typeVehi']);
        $voiture->setCaractVehi($row['caractVehi']);
        $voiture->setLocaVehi($row['locaVehi']);
        $voiture->setPhotoVehi($row['photoVehi']);
        $voiture->setDateLocation($dateFac);
        $voiture->setPrixLoc($row['prixVehi']);

        return $voiture;
    }
    
    public function create($values){
        /*** accès au model ***/
        $bdd = $this->bdd;
        
        $query = "INSERT INTO vehicule (idVehi, nomVehi, typeVehi, caractVehi, locaVehi, photoVehi, prixVehi) 
                VALUES (NULL, :nomVehi, :typeVehi, :caractVehi, :locaVehi, :photoVehi, :prixVehi);";

        if( !$this->verifNomVehi($values['nomVehi']) && !empty($values['nomVehi']) && 
            !empty($values['typeVehi']) && !empty($values['caractVehi']) && 
            !empty($values['locaVehi']) && !empty($values['photoVehi']) && !empty($values['prixVehi'])
            )
            {
                $elements = explode('|', $values['caractVehi']);
                
                if(count($elements) != 6){
                    $myView = new View();
                    $myView->redirect('ajoutVehiPage.html');
                }

                $tableau_objet = array();

                foreach ($elements as $element) {
                    $tableau_objet = [
                        'Class'         => trim($elements[0]),
                        'Chevaux'       => trim($elements[1]),
                        'nbPlace'       => trim($elements[2]),
                        'TypeMoteur'    => trim($elements[3]),
                        'VitesseMax'    => trim($elements[4]),
                        'BoiteVitesse'  => trim($elements[5])
                    ];
                }

                // On réencode en JSON
                $contenu_json = json_encode($tableau_objet);

                $req = $bdd->prepare($query);

                $req->bindValue(':nomVehi', $values['nomVehi'], PDO::PARAM_STR);
                $req->bindValue(':typeVehi', $values['typeVehi'], PDO::PARAM_STR);
                $req->bindValue(':caractVehi', $contenu_json);
                $req->bindValue(':locaVehi', $values['locaVehi'], PDO::PARAM_STR);
                $req->bindValue(':photoVehi', $values['photoVehi'], PDO::PARAM_STR);
                $req->bindValue(':prixVehi', $values['prixVehi']);

                $req->execute();
            }else{
                $myView = new View();
                $myView->redirect('ajoutVehiPage.html');
            } 
    }

    public function delete($idVehi){

        /*** accès au model ***/
        $bdd = $this->bdd;
        $query = "DELETE FROM vehicule WHERE idVehi = :idVehi";

        $req = $bdd->prepare($query);
        $req->bindValue(':idVehi', $idVehi, PDO::PARAM_INT);

        $req->execute();
    }

    public function dispoVehi($idVehi){

        /*** accès au model ***/
        $bdd = $this->bdd;

        /*** accès au model ***/
        $query = "SELECT * FROM vehicule WHERE idVehi = :idVehi";

        $req = $bdd->prepare($query);
        $req->bindValue(':idVehi', $idVehi, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $disponibilite = $row['locaVehi'];

        var_dump($disponibilite);
        if($disponibilite == 'Disponible'){
            $query = "UPDATE `vehicule` SET `locaVehi` = 'En_Revision' WHERE `vehicule`.`idVehi` = $idVehi";
            $req = $bdd->prepare($query);
            $req->execute();
        }else if($disponibilite == 'Deja_loue'){
            $query = "UPDATE `vehicule` SET `Deja_loue` = 'Deja_loue' WHERE `vehicule`.`idVehi` = $idVehi";
            $req = $bdd->prepare($query);
            $req->execute();
        }
        else{
            $query = "UPDATE `vehicule` SET `locaVehi` = 'Disponible' WHERE `vehicule`.`idVehi` = $idVehi";
            $req = $bdd->prepare($query);
            $req->execute();
        }

        $voiture = new Voiture();

        $voiture->setIdVehi($row['idVehi']);
        $voiture->setNomVehi($row['nomVehi']);
        $voiture->setTypeVehi($row['typeVehi']);
        $voiture->setCaractVehi($row['caractVehi']);
        $voiture->setLocaVehi($row['locaVehi']);
        $voiture->setPhotoVehi($row['photoVehi']);

        return $voiture;
    }

    function verifNomVehi($nomVehi) {
		/*** accès au model ***/
        $bdd = $this->bdd;

		//selectionner le nom
		$query="SELECT * FROM vehicule WHERE nomVehi = :nomVehi ";
		
		//verifie si le nom existe
		try {
			$req = $bdd->prepare($query);
			$req->bindValue(':nomVehi', $nomVehi, PDO::PARAM_INT);
			$bool = $req->execute();
			if ($bool) {
				$resultat = $req->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select nomVehi Ajout Vehicule : " . $e->getMessage() . "\n");
		}		

		
		if(count($resultat) == 0) return false;
		else return true;
	}
}

?>