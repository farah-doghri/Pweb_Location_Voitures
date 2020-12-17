<?php

include_once("_config.php");

MyAutoload::start();
if(isset($_GET["require"])){
    $request = $_GET["require"];
}else{
    $request = "home.html";
}

$routeur = new Routeur($request);
$routeur->renderController();


//include_once(CONTROLLER."home.php");

?>
