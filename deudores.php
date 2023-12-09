<?php
include "db.php";

if(isset($_POST['btn_volver'])){
    header("Location: index.php");
    exit();
}

$ob2 = new Base_datos();
$ob2->Conexion("localhost", "pagadiario", "root", "8del2del2004");
$ver_deudores="SELECT*FROM cliente";
$ob2->Mostrar_deudores($ver_deudores);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deudores</title>
</head>
<body>
    <h1>Deudores</h1>
    <form action="" method="POST">
        <input type="submit" name="btn_volver" value="VOLVER">
    </form>
    
</body>
</html>