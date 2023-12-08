<?php
include "db.php";
session_start();

$ob3=new Base_datos();
$ob3->Conexion("localhost", "pagadiario", "root", "8del2del2004");

//$cliente=$_POST['txb_buscarName'];
print("hola ".$_SESSION['search_name']);

if(isset($_POST['btn_volver_anadir'])){
    header("Location: anadir.php");
}

if(isset($_POST['btn_crear_deuda'])){
    print($cliente);

    $monto_prestar=$_POST['txt_prestamo'];
    $id_cliente="SELECT id FROM cliente WHERE nombre='$cliente'";
    $deudores="SELECT*FROM cliente";
    $ob3->Mostrar($id_cliente);

    //$prestamo_query="INSERT INTO prestamo(fecha_prestamo, id_cliente, restante) VALUES";

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
                <input type="number" name="txt_prestamo">
            </span>
            <br></br>
            <br></br>
            <input type="submit" value="CREAR DEUDA" name="btn_crear_deuda">
        </form>
    </header>
    
</body>
</html>