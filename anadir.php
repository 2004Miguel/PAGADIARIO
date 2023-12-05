<?php

include "db.php";

$ob1= new Base_datos();
$ob1->Conexion("localhost", "pagadiario", "root", "8del2del2004");

if(isset($_POST['btn_crear_deuda'])){
    
    $name=$_POST["txb_name"];
    $añadir="INSERT INTO cliente (nombre) VALUES ('$name')";
    $ob1->Insertar($añadir);
    header("Location:deuda.php");
}

if(isset($_POST['btn_volver'])){
    header("Location: index.php");
    exit();
}

if(isset($_POST['btn_buscar'])){
    $cliente=$_POST["txb_buscarName"];
    $buscar="SELECT nombre FROM cliente where nombre='$cliente'";
    $ob1->Comprobar_existencia($buscar);
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
</head>
<body>

    <h1>AÑADIR NUEVA DEUDA</h1>
    <form action="" method="POST">
        <input type="submit" name="btn_volver" value="VOLVER">
    </form>

    <main>
        <form action="" method="post">
            <p>Si el cliente ya exite, busquelo: </p>
            <span>
                <input type="text" autocomplete="name" placeholder="Buscar el nombre del cliente" name="txb_buscarName">
                <input type="submit" value="BUSCAR" name="btn_buscar">
            </span>
            <br></br>
            <br></br>

            <p>Sino, creelo llenando los siguientes campos: </p>
            <span>
                Nombre:
                <input type="text" name="txb_name" placeholder="nombre">
            </span>
            <br></br>
            <input type="submit" name="btn_crear_deuda" value="AÑADIR CLIENTE">
        </form>
    </main>
    
</body>
</html>