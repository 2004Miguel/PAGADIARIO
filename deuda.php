<?php
include "db.php";

$ob3=new Base_datos();
$ob3->Conexion("localhost", "pagadiario", "root", "8del2del2004");

$cliente=$_POST['txb_buscarName'];

if(isset($_POST['btn_volver_anadir'])){
    header("Location: anadir.php");
}

if(isset($_POST['btn_crear_deuda'])){
    $monto_prestar=$_POST['txt_prestamo'];

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deuda</title>
</head>
<body>
    <header>
        <h1>Deuda</h1>
        <form action="" method="post">
            <input type="submit" value="VOLVER" name="btn_volver_anadir">
            <br></br>
            <br></br>
            <span>
                Nombre del cliente:
                <input readonly type="text" value="<?php echo $cliente ?>" >
            </span>
            <br></br>
            <br></br>
            <span>
                Monto a prestar:
                <input type="number" required name="txt_prestamo">
            </span>
            <br></br>
            <br></br>
            <input type="submit" value="CREAR DEUDA" name="btn_crear_deuda">
        </form>
    </header>
    
</body>
</html>