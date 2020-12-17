<div class="container-delCli">
    <?php foreach($clients as $client): ?>

    <style>
        .card-client {
            position: relative;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            margin: 20px;
            text-align: center;
            background: #f3f3f3;
        }

        .card-client .image-logo{
            width: 80%;    
            padding-bottom: 30px;
            transition: all 0.5s ease;
        }
        .card-client .image-logo:hover{
            width: 90%;
            padding-bottom: 0px;
        }
        .card-client:hover {
             box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .card-client .card-container {
            padding: 2px 16px;
            text-align:left;
        }     
        .card-client h2{
            background-color: #000;
            color: #f3f3f3;
            text-align: center;
            margin: 0px;
            margin-bottom: 10px;
        }

        .card-container .btn {
            text-align: right;
        }

        .card-container button {
            background: #000;
            outline: none; 
            border: none; 
            color: #f3f3f3;
            padding: 5px 20px;
            justify-content: center;
            margin: 0px 10px 10px 0px;
        }

    </style>
    <div class="card-client">
        <h2><?php echo $client->getNomCli();?></h2>
        <img src="<?php echo IMAGES?>logo.png" class="image-logo">

        <div class="card-container">
            
            <p>Mail : <?php echo $client->getEmailCli();?></p>
            <p>Telephone :<?php echo $client->getTelCli();?></p>
            <p>Identifiant : <?php echo $client->getIdCli()?></p>

            <div class="btn">
                <a href="<?php echo HOST;?>delCli.html/id/<?php echo $client->getIdCli();?>">
                <button type="button">SUPPRIMER</button>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
