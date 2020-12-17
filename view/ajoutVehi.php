<style>
    .ajoutVehiForm{
        text-align: center;
        font-family: 'Roboto Mono', monospace;
        text-align: center;
        background: #fafafa;
        color: #000;
        padding: 110px 20px;
    }

    .container-ajoutVehi {
        width: 80%;
        margin: auto;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .ajoutVehiForm .titre {
        padding: 5px 0px;
        border-bottom: 2px solid #a1a1a1;
        background:#f3f3f3;
    }

    .ajoutVehiForm .titre h1 {
        font-size: 25px;
        margin: 0px auto;
        padding-top: 0px;
        color: #000;
    }

    table{
        margin: auto;
        width: 100%;
        padding: 40px 0px
    }   

    .param{
        color: #000;
        font-size: 15px;
        width: 30%;
    }
    .entrer{
        color: #000;
        font-size: 18px;
        width: 70%;
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

<div class="ajoutVehiForm">
    <form class="container-ajoutVehi" action="<?php echo HOST?>ajoutVehi.html" method="post">
        <div class="titre"> 
            <h1>AJOUTER UN VEHICULE</h1>
        </div>
        <div>
            <table>
                <tr>
                    <td> <label class="param">Nom</label> </td>
                    <td> <input class="entrer" type="text" name="values[nomVehi]" /> </td>
                </tr>
                <tr>
                    <td> <label class="param">Type</label> </td>
                    <td> <input class="entrer" type="text" name="values[typeVehi]" /> </td>
                </tr>
                <tr>
                    <td> <label class="param">Disponibilite</label> </td>
                    <td> <input class="entrer" type="text" name="values[locaVehi]" /> </td>
                </tr>
                <tr>
                    <td> <label class="param">Photo</label> </td>
                    <td> <input class="entrer" type="text" name="values[photoVehi]" /> </td>
                </tr>
                <tr>
                    <td> <label class="param">Caracteristique<br> (Class | Chevaux |<br> nbPlace | TypeMoteur | <br>VitesseMax |BoiteVitesse)</label> </td>
                    <td> <input class="entrer" type="text" name="values[caractVehi]" /> </td>
                </tr>
                <tr>
                    <td> <label class="param">Prix location</label> </td>
                    <td> <input class="entrer" type="number" name="values[prixVehi]" /> </td>
                </tr>
            </table>

            <input id="btn" type= "submit" value= "valider" /> </br> 
        </div>
        
    </form>

</div>
