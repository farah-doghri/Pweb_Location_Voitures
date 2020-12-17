<style>
    .container-achat {
		text-align: center;
        font-family: 'Roboto Mono', monospace;
        background: #fafafa;
        color: #000;
        padding: 110px 20px;
	}

	.container-achat .form {
		width:70%;
        margin: auto;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	}

	.form .titre {
		padding: 5px 0px;
        border-bottom: 2px solid #a1a1a1;
        background:#f3f3f3;
	}

	.form .titre h1 {
		font-size: 25px;
        margin: 0px auto;
        padding-top: 0px;
        color: #000;
	}

	table{
        margin: auto;
		width: 100%;
		padding: 60px 20px;
	}   

    .param{
        color: #000;
        font-size: 15px;
        width: 30%;
    }
    .entrer{
        color: #000;
        font-size: 18px;
        width: 60%;
	}

	#btn{
        margin: 20px 0px;
        padding: 10px 40px 10px 40px;
        text-transform: uppercase;
        font-size: 15px;
        border: 1px solid #000;
        letter-spacing: 2px;
        font-weight: bold;
        background-color: transparent;
        color: #000;
    }

    #btn:hover {
        background: #000;
        color: #f3f3f3;
    }
	
</style>
<div class="container-achat">
	<div class="form">
		<div class="titre">
            <h1>PROCEDEZ AU PAIEMENT</h1>
		</div>
		<div>
			<table>
                    <tr>
                        <td> <label class="param">Nom sur la carte</label> </td>
                        <td> <input class="entrer" type="text" name="nom" value=""/> </td>
                    </tr>
                    <tr>
                        <td> <label class="param">Numéro de la carte</label> </td>
                        <td> <input class="entrer" type="number" name="numCarte" value=""/> </td>
                    </tr>
                    <tr>
                        <td> <label class="param">Date d'expiration</label> </td>
                        <td> <input class="entrer" type="date" name="date" value=""/> </td>
                    </tr>
                    <tr>
                        <td> <label class="param">Code de sécurité</label> </td>
                        <td> <input class="entrer" type="number" name="code" value=""/> </td>
                    </tr>
			</table>

			<a href="<?php echo HOST;?>achat.html/id/<?php echo $idCliConnect?>"> 
			<input id="btn" type= "submit" value= "valider"></input>
			</a>

		</div>
	</div>
</div>
