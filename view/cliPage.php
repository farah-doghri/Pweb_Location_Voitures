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

/*Block options*/
.info_user {
    background: #000;
    padding : 20px;
    display : flex;
    justify-content: center;
    text-align: center;
}

.info_user .box .item {
    padding: 20px 40px;
    background: #f3f3f3;
    margin: 10px;
    width: 80px;
    text-align: center;
}

.info_user .box h3 {
    color: #f3f3f3;
    padding: 0px 10px;
    margin: 0px;
    font-size: 18px;
    font-weight: bold;
}

.info_user .box .item a {
    width: 100%;
    background: transparent;
    border: none;
    color: #000;
    font-size: 45px;
    outline: none;
}

</style>

<header>
    <h1 id="titre"><a href="<?php echo HOST;?>cliPage.html/id/<?php echo $idCliConnect?>">CFS LOCATION</a></h1>
	<h2 id="sous-titre">Bienvenue sur votre page client</h2>
	<p id="texte">Disposant d'une variété de voitures, CFS Location est la référence en termes de location de voitures.
		Quelles soient basiques ou de luxe, notre société saura vous satisfaire et vous proposer le meilleur.
		Osez le confort et la qualité de CFS Location et nous vous garantissons votre totale satisfaction.
	</p>
</header>

<div class="search">
    <h2>RECHERCHER UN VEHICULE</h2>
    <div id="rechercheForm">
        <form name="rechercheMarque" action="<?php echo HOST;?>cliPage.html/id/<?php echo $idCliConnect?>" method="post" action="post">
            <input id="motcle" type="text" name="values[motcle]" placeholder="Recherche par nom" />
            <input id="btnfind" type="submit" value="Recherche"/> 
        </form>
    </div>
</div>

<div class="info_user">
    <div class="box">
        <h3>PANIER</h3>
        <div class="item">   
            <a href="<?php echo HOST;?>panierPage.html/id/<?php echo $idCliConnect?>"><i class="fas fa-shopping-basket"></i></a>
        </div>
        <h3>LOCATIONS</h3>
        <div class="item">
            <a href="<?php echo HOST;?>locaCliPage.html/id/<?php echo $idCliConnect?> "><i class="fas fa-car"></i></a>
        </div>
    </div>
    <div class="box">
        <h3>FACTURE</h3>
        <div class="item">
            <a href="<?php echo HOST;?>facturePage.html/id/<?php echo $idCliConnect?>"><i class="fas fa-file-invoice-dollar"></i></a>
        </div>
        <h3>PROFIL</h3>
        <div class="item">
            <a><i class="fas fa-user"></i></a>
        </div>
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

                .card-container .btn {
                    text-align: right;
                    margin: 0px 10px 10px 0px;
                }

                .card-container a {
                    background: #000;
                    outline: none; 
                    border: none; 
                    color: #f3f3f3;
                    padding: 3px 20px;
                    justify-content: center;
                    text-decoration: none;
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
                
                <div class="btn">
                <a href="<?php echo HOST;?>ajoutPanier.html/id/<?php echo $voiture->getIdVehi().'_'.$idCliConnect?>">LOUER</a>
                </div>
                    
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    
</div>
