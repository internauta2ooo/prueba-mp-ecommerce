<?php
var_dump("El pago fue aprovado con exito!");
var_dump("Gracias!");
?>
<br>
<?php

var_dump($_POST);
var_dump("Collecion y status");

var_dump($_GET["collection_id"]);
var_dump($_GET["collection_status"]);
var_dump("External referece y payment");
var_dump($_GET["external_reference"]);
var_dump($_GET["payment_type"]);
var_dump($_GET["merchant_order_id"]);
?>