<?php 
var_dump("Procesar pago... respuesta");
var_dump($_POST);
var_dump($_REQUEST);
var_dump($_FILES);
var_dump($_GET);

header("Location:".$_POST["back_url"]);

?>