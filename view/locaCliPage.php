<div class="container-vehi">
        
    <?php foreach($clientVoiture as $voiture): ?>

        <style>
            .card-vehicule {
                position: relative;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                margin: 20px;
                text-align: center;
                background: #f3f3f3;
            }

            .card-vehicule h2{
                background-color: #000;
                color: #f3f3f3;
                text-align: center;
                margin: 0px;
                margin-bottom: 10px;
            }

            .card-vehicule .image-voiture{
                width: 80%;    
                padding-bottom: 30px;
                transition: all 0.5s ease;
            }
            .card-vehicule .image-voiture:hover{
                width: 90%;
                padding-bottom: 0px;
            }
            .card-vehicule:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }

            .card-vehicule .card-container {
                padding: 2px 16px;
                text-align:left;
            }     
           

        </style>
        <div class="card-vehicule">
            <h2><?php echo $voiture->getNomVehi();?></h2>
            <img src="<?php echo IMAGES.$voiture->getPhotoVehi();?>" class="image-voiture">

            <div class="card-container">
                
                <p><?php echo $voiture->getTypeVehi();?></p>
                <p>Le véhicule est <?php echo $voiture->getLocaVehi();?></p>
                <p>Voici les caractéristiques du véhicule :</p>
                <p><?php echo "Nombre de place = ".$voiture->getCaractVehi()->nbPlace ." | Type de moteur = ".$voiture->getCaractVehi()->TypeMoteur." | Boite de vitesse = ".$voiture->getCaractVehi()->BoiteVitesse ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    
</div>