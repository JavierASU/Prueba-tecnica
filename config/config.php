<?php

$Chost = "localhost";
$Cuser = "root";
$Cpass = "";
$Cdb = "chat";

$con = new mysqli($Chost,$Cuser,$Cpass,$Cdb);

if ($con->connect_error) {
    die ("ha ocurrido un error");
}
?>