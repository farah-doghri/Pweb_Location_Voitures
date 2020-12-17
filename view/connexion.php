<style>
    form{
        text-align: center;
        font-family: 'Roboto Mono', monospace;
        text-align: center;
        background: #fafafa;
        color: #000;
        padding: 110px 20px;
    }

    .container-connexion {
        width: 50%;
        margin: auto;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    form .titre {
        padding: 5px 0px;
        border-bottom: 2px solid #a1a1a1;
        background:#f3f3f3;
    }

    form .titre h1 {
        font-size: 25px;
        margin: 0px auto;
        padding-top: 0px;
        color: #000;
    }

    .form_items {
        padding: 40px 20px ;
        background: #fafafa;
    }

    .radio_btn {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .radio_btn .btn {
        padding: 10px;
    }

    .social_media {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .social_media .item{
        width: 35px;
        height: 35px;
        border: 2px solid #a1a1a1;
        margin: 0 5px;
        text-align: center;
        line-height: 35px;
        border-radius: 50%;
        cursor: pointer;
        color: #a1a1a1;
        transition: all 0.5s ease;
    }

    .social_media .item:hover {
        border-color:#000;
        color: #000;
    }

    table{
        margin: auto;
        width: 100%;
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
        margin-top: 20px;
        padding: 10px 20px;
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


<form action="<?php echo HOST?>connect.html" method="post">
    <div class="container-connexion">
        <div class="titre"> 
            <h1>CONNECTEZ VOUS</h1>
        </div>

        <div class="form_items">
            <div class="radio_btn">
                <div class="btn">
                    <input type="radio" id="bailleur" name="values[role]" value="bailleur">
                        Bailleur
                    </input>
                </div>

                <div class="btn">
                    <input type="radio" id="loueur" name="values[role]" value="loueur">
                        Loueur
                    </input>
                </div>
            </div>

            <div class="social_media">
                <div class="item">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="item">
                    <i class="fab fa-twitter"></i>
                </div>
                <div class="item">
                    <i class="fab fa-google-plus-g"></i>
                </div>
            </div>

            <div >
                <table>
                    <tr>
                        <td> <label class="param">Nom</label> </td>
                        <td> <input class="entrer" type="text" name="values[nom]" /> </td>
                    </tr>
                    <tr>
                        <td> <label class="param">Mot de Passe</label> </td>
                        <td> <input class="entrer" type="password" name="values[mdp]" /> </td>
                    </tr>
                </table>

                <input id="btn" type= "submit" value= "Se connecter"/> </br>

            </div>
        </div>
    </div>
</form>