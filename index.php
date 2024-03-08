<?php
include "config/config.php";
include "config/funcion.php";
   
if (!isset($p)) {
    $p = "inicio";
    
}

    ?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
 <script type="text/javascript"  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <link rel="stylesheet" type="text/css" href="css/style.css" >                         
</head>

<body>

    <?php

    if (isset($_POST['reg'])) {
        $user = $_POST['reguser'];
        $pass = md5($_POST['regpass']);


        $c = $con->query("SELECT user FROM usuarios WHERE user = '$user'");
        if ($c->num_rows > 0) {
            echo "Ya existe el usuario";
        } else {
            $s = $con->query("INSERT INTO usuarios (user,pass,rank,fecha) VALUES ('$user','$pass','1',now())");
            if ($s) {
                echo "Se registro correctamente";
            }
        }
        ;
    }


    if (isset($_POST['log'])) {
        $user = $_POST['loguser'];
        $pass = md5($_POST['logpass']);

        $q=$con->query("SELECT * FROM usuarios WHERE user ='$user' AND pass = '$pass' ");
        if ($q->num_rows >0) {
            $r =$q->fetch_array();
            $_SESSION['id'] = $r['id'];
            header("Location: index.php");
          
        }

    }



    ?>

<?php

    if(isset($_SESSION['id'])) {
        echo"Bienvenido, <a href='modulos/logout.php'>Salir</a>";
        

        ?>
        <br></br>
        <?php
            if (file_exists("modulos/".$p.".php")) {
                include "modulos/".$p.".php";
            }else{
                echo "Este modulo no existe";
            }

    }else{  ?>


<?php if (isset($_GET['p'])!='registro') { ?>
    
    

    <center>
    <h1>inicia sesion</h1>
    <form method="POST" action="">
        <input type="text" name="loguser" class="campo"> <br><br>
        <input type="password" name="logpass" class="campo"><br><br>
        <input type="submit" name="log" value="Ingresar" class="boton">
    </form>
    <a href="?p=registro" >Registrase</a>
    </center>
<?php }else{ ?>
    <center>
    <h1>Registrarme</h1>
    <form method="POST" action="">
        <input type="text" name="reguser" class="campo"><br><br>
        <input type="password" name="regpass" class="campo"><br><br>
        <input type="submit" name="reg" value="Registrarme" class="boton" >
    </form>
    <a href="./">Iniciar session</a>

    </center>
    <?php } ?> 

<?php } ?>

</body>

</html>