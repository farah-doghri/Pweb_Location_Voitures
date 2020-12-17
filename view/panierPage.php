

<style>
    .container {
        background-color:#f3f3f3;
        width: 100%;
    }

    .container h1 {
        text-align: center;
        margin: 0px auto;
        padding: 30px 20px;
    }

    .container-panier{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .container-panier .panier-box {
        flex: calc(100% / 4);
        position: relative;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        margin: 20px;
        text-align: center;
        background: #f3f3f3;
    }

    .container-panier .panier-box:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .panier-box h2 {
        background-color: #000;
        color: #f3f3f3;
        text-align: center;
        margin: 0px;
        margin-bottom: 10px;
    }

    .panier-box img {
        width: 80%;    
        padding-bottom: 30px;
        transition: all 0.5s ease;
    }

    .panier-box img:hover {
        width: 90%;
        padding-bottom: 0px;
    }

    .panier-box .content {
        padding: 2px 16px;
        text-align:left;
    }

    .achat-box {
        text-align: center;
    }

    .achat-box .btn {
        margin: 10px 0px 20px 0px; 
    }

    .achat-box a {
        font-size: 22px;
        background: #000;
        outline: none; 
        border: none; 
        color: #f3f3f3;
        padding: 5px 20px;
        justify-content: center;
        
        text-decoration: none;
    }

</style>

<div class="container">
    <h1>RECAPITULATIF DE VOTRE PANIER</h1>

    <div class="container-panier">
        <?php foreach($clientVoiture as $voiture): ?>

        <div class="panier-box">
            <h2><?php echo $voiture->getNomVehi();?></h2>
            <img  src="<?php echo IMAGES.$voiture->getPhotoVehi();?>" class="image-voiture">

            <div class="content" >
                <p>Voici les caractéristiques du véhicule :</p>
                <p><?php echo "Nombre de place = ".$voiture->getCaractVehi()->nbPlace ." | Type de moteur = ".$voiture->getCaractVehi()->TypeMoteur." | Boite de vitesse = ".$voiture->getCaractVehi()->BoiteVitesse ?></p>
            </div>
            <p class="panier-box-content" >Prix = <?php echo $voiture->getPrixLoc()?></h2>   
        </div>

        <?php endforeach; ?>
            
    </div> 

    <div class="achat-box">
        <div class="total">
            <?php $somme = 0; foreach($clientVoiture as $voiture): ?>
            <div class="item"> 
                <?php  $taille = 0; $somme += intval($voiture->getPrixLoc()); $taille += 1; $voiture->getPrixLoc();?>
            </div>
            <?php endforeach; ?>
            <p>Total = <?php echo $somme / $taille ?></p>
        </div>

        <div class="btn">
            <a href="<?php echo HOST;?>achatForm.html/id/<?php echo $idCliConnect?>">Valider Panier</a>
        </div>
    </div>
    
</div>