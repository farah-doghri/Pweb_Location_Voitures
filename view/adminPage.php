<style>
    
/*Bloc de recherche*/
.search {
	height:auto;
	background-color: #000;
	padding: 25px;
	margin : 0px;
}

.search h2 {
	color: #f3f3f3;
    font-size: 19px;
    margin: 0px;
    margin-bottom: 10px;
}

.search #rechercheForm{
	width: 100%;
    font-size: 17px;
    margin: 0px;
	background-color: transparent;
	outline : none;
	border: none;
	color: #f3f3f3;
}
.search #motcle{
    width: 70%;
	padding : 10px 15px;
	font-size: 17px;
	background-color: transparent;
	margin-right: 15px;
	outline : none;
	border: none;
	border-bottom: 2px solid #f3f3f3;
	color: #f3f3f3;
}
.search #btnfind{
    width: 15%;
	padding: 8px 14px; 
	background-color: transparent;
	border: 1px solid #f3f3f3;
    color: #f3f3f3;
    font-size: 17px;
}
.search #btnfind:hover {
    background-color: #f3f3f3; 
    color: #000;
}
</style>

<header>
    <h1 id="titre"><a href="<?php echo HOST;?>adminPage.html">CFS LOCATION</a></h1>
	<h2 id="sous-titre">Bienvenue sur la page Administrateur</h2>
	<p id="texte">Disposant d'une variété de voitures, CFS Location est la référence en termes de location de voitures.
		Quelles soient basiques ou de luxe, notre société saura vous satisfaire et vous proposer le meilleur.
		Osez le confort et la qualité de CFS Location et nous vous garantissons votre totale satisfaction.
	</p>
</header>

<div class="search">
    <h2>RECHERCHER UN VEHICULE</h2>
    <div id="rechercheForm">
        <form name="rechercheMarque" action="<?php echo HOST;?>adminPage.html" method="post" action="">
            <input id="motcle" type="text" name="values[motcle]" placeholder="Recherche par nom" />
            <input id="btnfind" type="submit" value="Recherche"/> 
        </form>
    </div>
</div>
<div class="container-gestion">
    <div class="btn">
        <p> Supprimer Client</p>
        <a  href="<?php echo HOST;?>delCliPage.html">
            <button>Supprimer</button>
        </a>
    </div>
    <div class="btn">
        <p>Formulaire ajout Vahicule</p>
        <a  href="<?php echo HOST;?>ajoutVehiPage.html">
            <button>Ajout</button>
        </a>
    </div>
</div>
<div class="container-vehi">

    <?php foreach($voitures as $voiture): ?>

        <style>
            .card-vehicule {
                position: relative;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                margin: 20px;
                text-align: center;
                background: #f3f3f3;
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
            .card-vehicule h2{
                background-color: #000;
                color: #f3f3f3;
                text-align: center;
                margin: 0px;
                margin-bottom: 10px;
            }

            .deleteButton a{
                text-decoration: none;
                color: #000;
                text-transform: uppercase;
            }

            .deleteButton {
                background: transparent;
                outline: none; 
                border: 1px solid #000; 
                padding: 5px 20px;
                justify-content: center;
                margin: 0px 10px 10px 0px;
            }

            .deleteButton:hover {
                background: #000;
                border: none;
            }

            .deleteButton a:hover {
                color: #f3f3f3;
            }
            /*CheckBox*/
            .revisionCheck[type="checkbox"]{
                position: relative;
                width: 40px;
                height: 20px;
                -webkit-appearance: none;
                background: #c6c6c6c6;
                outline: none;
                border-radius: 20px;
                box-shadow: inset 0 0 0px rgba(0,0,0,0.2);
                transition: .5s;
            }
            .revisionCheck:checked[type="checkbox"]{
                background: #0e0d0f;
            }
            .revisionCheck[type="checkbox"]:before{
                content: '';
                position: absolute;
                width: 20px;
                height: 20px;
                border-radius: 20px;
                top: 0;
                left: 0;
                background: #fff;
                transform: scale(1.1);
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                transition: .5s;
            }
            .revisionCheck:checked[type="checkbox"]:before{
                left: 20px;
            }
        </style>
        <div class="card-vehicule">
            <h2><?php echo $voiture->getNomVehi();?></h2>
            <img src="<?php echo IMAGES.$voiture->getPhotoVehi();?>" class="image-voiture">

            <div class="card-container">
                
                <p><?php echo $voiture->getTypeVehi();?></p>
                <p>Voici les caractéristiques du véhicule :</p>
                <p><?php echo "Nombre de place = ".$voiture->getCaractVehi()->nbPlace ." | Type de moteur = ".$voiture->getCaractVehi()->TypeMoteur." | Boite de vitesse = ".$voiture->getCaractVehi()->BoiteVitesse ?></p>
                
                <button class="deleteButton">
                    <a href="<?php echo HOST;?>delVehi.html/id/<?php echo $voiture->getIdVehi();?>">
                    supprimer vehicule
                    </a>
                </button>
                
                <div class="DisponibiliteBox">
                    <p>Disponibilité : <?php echo $voiture->getLocaVehi();?></p>
                    <a href="<?php echo HOST;?>dispoVehi.html/id/<?php echo $voiture->getIdVehi();?>"><input class="revisionCheck" type="checkbox" name="values[revision]"></a>
                </div>
                <p>Date de location : <?php echo $voiture->getDateLocation();?></p>
                <p>Prix location : <?php echo $voiture->getPrixLoc();?></p>
            </div>
        </div>
    <?php endforeach; ?>

</div>