<?php
include "db.php";
session_start();

//echo "<h1>Abonos</<h1>";

$pagos=new Base_datos();
$pagos->Conexion("localhost", "pagadiario", "root", "8del2del2004");


if(isset($_POST['btn_back'])){
    header("Location: index.php");
}

if(isset($_POST['btn_ver_abonos'])){
    $nombre=$_POST['txt_name'];

    $id_cliente=$pagos->Id_clientex2($nombre);
    $pagos->Ver_abonos($id_cliente);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonos</title>
</head>
<body>
    <br></br>

    <form action="" method="post">
        <label for="deudor">Nombre del deudor</label>
        <input type="text" name="txt_name" placeholder="Nombre del deudor" id="deudor">
        <br></br>
        <input type="submit" value="BUSCAR ABONOS" name="btn_ver_abonos">
    </form>
    <br></br>
    <form action="" method="post">
        <input type="submit" name="btn_back" value="VOLVER">
    </form>
</body>
</html>