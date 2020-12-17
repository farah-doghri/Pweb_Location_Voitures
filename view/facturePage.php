<style>

	.block{
		background-color:#f3f3f3;
        width: 100%;
	}

	.block h1 {
		text-align: center;
        margin: 0px auto;
        padding: 30px 20px;
	}

   .block .container-facture {
		display: flex;
        justify-content: center;
		flex-wrap: wrap;
   }
   
   .card-facture {
		flex: calc(100% / 4);
        position: relative;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        margin: 20px;
        text-align: center;
        background: #f3f3f3;
   }

   .card-facture h2 {
		background-color: #000;
    	color: #f3f3f3;
    	text-align: center;
        margin: 0px;
        margin-bottom: 10px;
   }

   .card-facture .card-container {
		padding: 2px 16px;
        text-align:left;
   }

</style>

<div class="block">
   <h1>FACTURE</h1>
	<?php foreach($clientVoiture as $voiture): ?>

	<div class="container-facture">
		
		<div class="card-facture">
			<h2><?php echo $voiture->getNomVehi();?></h2>
			<div class="card-container">
				<p>Date Début : <?php echo $voiture->getDateLocation();?></p>
				<p>Prix sur le mois : <?php echo $voiture->getPrixLoc();?></p>
				<p>Prix Total : </p>
			</div>
		</div>

		
	</div>
	<?php endforeach; ?>
</div>