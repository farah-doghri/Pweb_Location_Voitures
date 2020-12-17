<?php
    //Afficher les véhicules
    $this->_t = "Accueil";
    
    foreach($vehicule as $vehicules): ?>

        <style>
        .image-voiture{
            width: 100%;
        }
        .card-vehicule {
            position: relative;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 50%;
            margin: 20px;
        }

        .card-vehicule:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .card-container {
            padding: 2px 16px;
        }
        
        

    </style>
    <div class="card-vehicule">
        <img src="<?= $vehicules->photo() ?>" class="image-voiture">
        <div class="card-container">
            <h2>Type : <?= $vehicules->type()?></h2>
            <p><?= $vehicules->location()?></p>
        </div>
    </div>
<?php endforeach; ?>