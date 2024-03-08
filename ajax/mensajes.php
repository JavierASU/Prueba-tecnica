<?php
include "../config/config.php";
include "../config/funcion.php";


$m=$con->query("SELECT * FROM mensajes ORDER BY id DESC LIMIT 20");

while($w=$m->fetch_array()) {
    
    $us =$con->query("SELECT user FROM usuarios WHERE id = '".$w['user']."'");
    $ss = $us->fetch_array()

    
    ?>

<div class="ms">

<b><?=$ss['user'];?>:</b>  <?=$w['mensaje']; ?>  <small style="float: right;" ><?=$w['fecha']; ?></small>

</div>



<?php } ?>
