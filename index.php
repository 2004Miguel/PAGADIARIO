<?php

if(isset($_POST['btn_añadir'])){
    header("Location: anadir.php");
    exit();
}

if(isset($_POST['btn_abonar'])){
    header("Location: abonar.php");
    exit();
}

if(isset($_POST['btn_deudor'])){
    header("Location: deudores.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <head>
        <H1>ELIJA QUE HACER</H1>
    </head>
    <main>
        <form action="" method="POST">
            <p>Aprete un botón para hacer lo que necesite</p>
            <br>
            <h3>AÑADIR</h3>
            <input type="submit" value="AÑADIR" name="btn_añadir">
            <p>Este botón es para crear nuevas deudas</p>

        </form>
       
        <form action="" method="POST">
            <br>
            <h3>ABONAR</h3>
            <input type="submit" name="btn_abonar" value="AÑADIR">
            <p>Esta opción es para añadir abonos de los deudores</p>
            <br>
        </form>

        <form action="" method="POST">
            <h3>VER DEUDORES</h3>
            <p>Aprete el siguiente botón para ver las personas con saldos pendientes</p>
            <input type="submit" name="btn_deudor" value="VER DEUDORES">
        </form>

        
    </main>
    
</body>
</html>