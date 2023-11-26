<?php
if(isset($_POST['btn_crear_deuda'])){
    $nombre=$_POST["txb_name"];

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
                <input type="text" name="txb_name">
            </span>
            <br></br>
            <input type="submit" name="btn_crear_deuda" value="CREAR DEUDA">
        </form>
    </main>
    
</body>
</html>