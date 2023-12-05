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

        public function Mostrar($consultap){

            $resultado=mysqli_query($this->conexion, $consultap);

            while($fila=mysqli_fetch_row($resultado)){//cuadno la condición no está igualada a nada, se evalua que la condición sea igual a 0 
                //mientras la funcion fetch_row encuentre registros, se va a ejecutar el ciclo 
                print($fila[1]);
                echo "<br>";
            }
            mysqli_close($this->conexion);
            
        }

        public function Insertar($insert){
            if($resultado2=mysqli_query($this->conexion, $insert)){
                print("Deuda creada con éxito");
            }
            mysqli_close($this->conexion);
        }

        public function Comprobar_existencia($consultap){
            $busqueda=mysqli_query($this->conexion, $consultap);

            if($busqueda->num_rows>0){
                print("El cliente existe");
            }else{
                print("El cliente no existe");
            }
            
        }
    }
?>