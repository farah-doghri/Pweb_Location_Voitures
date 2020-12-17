<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CFS Location</title>
        
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" >

		<script src="https://kit.fontawesome.com/18d16b7399.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?php echo ASSETS;?>style.css"/>
    </head>
    <body>
		<div class="nav_bar">
			<ul>
				<li class="home_button"><a href="<?php echo HOST;?>home.html">CFS Location</a></li>	
				<li><a class="nav_subs" href="<?php echo HOST;?>inscription.html">S'INSCRIRE</a></li>
				<li><a href="<?php echo HOST;?>connexion.html">SE CONNECTER</a></li>
			</ul>
		</div>
		
        <!--La page-->
		<div class="container">
			<?php echo $contentPage ?>
		</div>
        

        <div class="footer">
			<h3>NOS AGENCES DE LOCATION EN FRANCE</h3>
			<div class="grid_container">
				<div class="line">
					<div class="grid-item">Aix-en-Provence</div>
					<div class="grid-item">Ajaccio</div>
					<div class="grid-item">Angers</div>
					<div class="grid-item">Bastia</div>
					<div class="grid-item">Bayonne</div>
				</div>
				<div class="line">
					<div class="grid-item">Béziers</div>
					<div class="grid-item">Bordeaux</div>
					<div class="grid-item">Brest</div>
					<div class="grid-item">Caen</div>
					<div class="grid-item">Corse</div>
				</div>
				<div class="line">
					<div class="grid-item">Dijon</div>
					<div class="grid-item">Dunkerque</div>
					<div class="grid-item">Grenoble</div>
					<div class="grid-item">Île-de-France</div>
					<div class="grid-item">La Rochelle</div>
				</div>
				<div class="line">
					<div class="grid-item">Le Havre</div>
					<div class="grid-item">Lille</div>
					<div class="grid-item">Limoges</div>
					<div class="grid-item">Lorient</div>
					<div class="grid-item">Lyon</div>
				</div>
				<div class="line">
					<div class="grid-item">Marne-la-Vallée</div>
					<div class="grid-item">Marseille</div>
					<div class="grid-item">Metz</div>
					<div class="grid-item">Montpelier</div>
					<div class="grid-item">Nancy</div>
				</div>
				<div class="line">
					<div class="grid-item">Nantes</div>
					<div class="grid-item">Nice</div>
					<div class="grid-item">Paris</div>
					<div class="grid-item">Reims</div>
					<div class="grid-item">Strasbourg</div>
				</div>
			</div>
		
			<div class="footer_info">
				<ul>
					<li><a href="">CONTACT</a></li>
					<li><a href="">FAQ</a></li>
					<li><a href="">INFORMATIONS GENERALES</a></li>
					<li><a href="">ACTUALITES</a></li>
					<li><a href="">PARTENAIRES</a></li>
					<li><a href="">MENTIONS LEGALES</a></li>
					<li><a href="">DONNEES PERSONNELLES</a></li>
				</ul>
			</div>
		</div>
    </body>
</html>