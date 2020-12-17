<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf_8">
        <title><?= $t ?></title>
        <link rel="stylesheet" href="vue/css/test.css" type="text/css">
    </head>
    <body>
        <header>
            <h1 id="header-titre"><a href="<?= URL ?>">CFS Location</a></h1>
            <p id="header-texte">Site de location de voiture</p>
        </header>
        <nav>
            <a href="Connexion">Connexion</a>
            <a href="Inscription">Inscription</a>
        </nav>
        
        <div class="container">
            <?= $content ?>
        </div>
    </body>

</html>