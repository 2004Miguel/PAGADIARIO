<?php
include "db.php";
session_start();

$ob5=new Base_datos();
$ob5->conexion("localhost", "pagadiario", "root", "8del2del2004");

if(isset($_POST['btn_volver'])){
    header("Location: index.php");
    exit();
}

if(isset($_POST['btn_pagar'])){
    $customer=$_POST['txb_customer_pay'];
    //print("hola ".$customer);
    $value_pay=$_POST['txb_value_pay'];
    //print("hola ".$value_pay);
    $query_customer="SELECT*FROM cliente WHERE nombre='$customer'";

    if($ob5->Comprobar_existencia($query_customer)==1){//El cliente existe
        $id_customer="SELECT id FROM cliente WHERE nombre='$customer'";
        $id_clien=$ob5->Id_cliente($id_customer);//id del cliente
        //print($id_clien);
        $id_deuda=$ob5->Deuda_existente($id_clien);//el cliente tiene deudas
        $fecha_abono= date("Y-m-d");
        if($id_deuda != 0){// El cliente tiene deudas asociadas 

            $ob5->Insertar_abono($fecha_abono, $id_clien, $id_deuda, $value_pay);
        }
    }

}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonar</title>
</head>
<body>
    <h1>PANTALLA ABONAR</h1>
    <form action="" method="POST">
        <input type="submit" name="btn_volver" value="VOLVER">
    </form>
    <br></br>
    <br></br>

    <form action="" method="post">        
        <p>Ingrese el nombre de la persona que tiene un prestamo y va a abonar</p>
        <label for="txb_customer_pay">Cliente</label>
        <input id="txb_customer_pay" type="text" name="txb_customer_pay" placeholder="Nombre">
        <br></br>
        <label for="value_pay">Valor a pagar</label>
        <input id="value_pay" type="number" placeholder="Cantidad" name="txb_value_pay">
        <br></br>
        <input type="submit" value="PAGAR" name="btn_pagar">
    </form>

    
</body>
</html>