<?php
    
    class Base_datos{

        public $db_host;
        public $db_nombre;
        public $db_user;
        public $db_password;
        public $conexion;

        public function __construct() {
            //print("objeto creado\n");
            print("");

        }

        public function Conexion($db_hosp, $db_nombrep, $db_userp, $db_passwordp){

            $this->db_host=$db_hosp;
            $this->db_nombre=$db_nombrep;
            $this->db_user=$db_userp;
            $this->db_password=$db_passwordp;

            $this->conexion=mysqli_connect($db_hosp, $db_userp, $db_passwordp, $db_nombrep);
            if (mysqli_connect_errno()) {
                echo "error al conectar con la base de datos";
                exit();
            }
            //print('Conexion exitosa');
        }

        public function Mostrar_deudores($consultap){

            $resultado=mysqli_query($this->conexion, $consultap);

            while($fila=mysqli_fetch_row($resultado)){//cuadno la condición no está igualada a nada, se evalua que la condición sea igual a 0 
                //mientras la funcion fetch_row encuentre registros, se va a ejecutar el ciclo 
                print($fila[0]);
                print($fila[1]);
                echo "<br>";
            }
            mysqli_close($this->conexion);
            return $fila[0];            
        }

        public function Insertar($insert){
            if($resultado2=mysqli_query($this->conexion, $insert)){
                print("Deuda creada con éxito");
            }
            mysqli_close($this->conexion);
        }

        public function Insertar_cliente($consulp_costumer, $namep){
            $verificacion_existencia="SELECT*FROM cliente WHERE nombre='$namep'";
            $resul=mysqli_query($this->conexion, $verificacion_existencia);

            if($resul->num_rows>0){
                print("El cliente ya existe, busquelo para crear la deuda");
                return 0;
            }else{
                $insert=mysqli_query($this->conexion, $consulp_costumer);
                return 1;
            }
            
        }

        public function Comprobar_existencia($consultap){
            $busqueda=mysqli_query($this->conexion, $consultap);

            if($busqueda->num_rows>0){
                print("El cliente existe");
                return 1; //existe el cliente
            }else{
                print("El cliente no existe");
                return 0; //no existe el cliente 
            }    
        }

        public function Id_cliente($consultap){
            $consu=mysqli_query($this->conexion, $consultap);
            $fila=mysqli_fetch_row($consu);

            return $fila[0];
        }

        public function Borrar_deudas(){
            $query="DELETE FROM prestamo";
            $resul=mysqli_query($this->conexion, $query);
            print("prestamos borrados con exito");  
        }

        public function Deuda_existente($id_customerp){
            $query="SELECT id FROM prestamo WHERE id_cliente='$id_customerp'";
            $resul=mysqli_query($this->conexion, $query);
            $fila=mysqli_fetch_row($resul);

            if($resul->num_rows>0){
                return $fila[0];
                //print("Tiene deudas");
            }else{
                return 1;
                //print("No tiene deudas");
            }
        }

        public function Insertar_abono($fecha_abonop, $id_clientep, $id_prestamop, $monto_abonop){
            $abono_query="INSERT INTO abono (fecha_abono, id_cliente, id_prestamo, monto_abono) VALUES ('$fecha_abonop', '$id_clientep', '$id_prestamop', '$monto_abonop')";

            $resul=mysqli_query($this->conexion, $abono_query);
            //$fila=mysqli_fetch_row($resul);

            if($resul==false){
                print("Error al hacer abono");
                return 0;
            }else{
                print("Abono hecho exitosamente");
                return 1;
            }

        }

        public function Restante_prestamo($id_clientep){
            $monto_prestado_query="SELECT monto_prestado FROM prestamo WHERE id_cliente='$id_clientep'";
            $monto_prestado=mysqli_query($this->conexion, $monto_prestado_query);
            $fila=mysqli_fetch_row($monto_prestado);

            return $fila[0];
        }

        public function Valor_abono($id_clientep, $id_prestamop){

            $abono_query="SELECT monto_abono FROM abono WHERE id_cliente='$id_clientep' AND id_prestamo='$id_prestamop'";
            $abono=mysqli_query($this->conexion, $abono_query);

            $fila=mysqli_fetch_row($abono);
            return $fila[0];
        }

        function Update_restante_prestamo($restante_prestamop, $abonop, $id_deudap){
            $restante=$restante_prestamop-$abonop;
            $restante_query="UPDATE prestamo SET restante='$restante' WHERE  id='$id_deudap'";
            $resul=mysqli_query($this->conexion, $restante_query);

            if($resul==true){
                print("Actualización del restante exitosa");
            }else{
                print("Error al actualizar el restante");
            }
        }

    }
?>