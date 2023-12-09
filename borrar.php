<?php
include "db.php";
session_start();

$ob4=new Base_datos();
$ob4->conexion("localhost", "pagadiario", "root", "8del2del2004");
//se implementa este metodo para facilidades de desarrollo y de pruebas 

$ob4->Borrar_deudas();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar deuda</title>
</head>
<body>
    <h1>Borrar deuda</h1>
</body>
</html>