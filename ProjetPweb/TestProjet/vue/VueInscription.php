<?php
    $this->_t = "Inscription";
?>

<style>
    .container-connexion{
        border: 1px solid #7e7e7e;
        width: 100%;
        text-align: center;
        background-color: #121212;
    }
    table{
        margin-left: auto;
        margin-right: auto;
    }
    h1{
        color: #00fe5d;
        font-size: 35px;
    }
    .param{
        color: #7e7e7e;
        font-size: 20px;
    }
    .entrer{
        color: #7e7e7e;
        font-size: 20px;
    }
    #btn{
        margin-top: 20px;
        padding: 10px 40px 10px 40px;
        text-transform: uppercase;
        font-size: 25px;
        border: 3px solid black;
        border-radius: 18px;
        letter-spacing: 2px;
        font-weight: bold;
        background-color: #00fe5d;
        color: black;
    }
</style>

<form class="container-connexion" action="Inscription" method="post">
    <div >
        <h1>Formulaire d'Inscription</h1>
        <table>
            <tr>
                <td> <label class="param">Nom</label> </td>
                <td> <input class="entrer" type="text" name="nom" value=""/> </td>
            </tr>
            <tr>
                <td> <label class="param">Mot de passe</label> </td>
                <td> <input class="entrer" type="password" name="mdp" value=""/> </td>
            </tr>
            <tr>
                <td> <label class="param">Email</label> </td>
                <td> <input class="entrer" type="email" name="email" value=""/> </td>
            </tr>
        </table>

        <a href="<?= URL ?>"><input id="btn" type= "submit" value= "valider"/></a>

    </div>
</form>