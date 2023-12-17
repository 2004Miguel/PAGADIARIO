<?php
include "db.php";
session_start();

//echo "<h1>Abonos</<h1>";

$pagos=new Base_datos();
$pagos->Conexion("localhost", "pagadiario", "root", "8del2del2004");

$pagos->Ver_abonos();

if(isset($_POST['btn_back'])){
    header("Location: index.php");
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
        <input type="submit" name="btn_back" value="VOLVER">
    </form>
</body>
</html>