<?php
include "../config/config.php";
include "../config/funcion.php";


$mensaje=$_REQUEST['mensaje'];

$e=$con->query("INSERT INTO mensajes (mensaje,user,fecha) VALUES ('$mensaje', '".$_SESSION['id']."',now())");
