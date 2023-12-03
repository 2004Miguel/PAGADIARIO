<?php
    
    class Base_datos{

        public $db_host;
        public $db_nombre;
        public $db_user;
        public $db_password;
        public $conexion;

        public function __construct() {
            print("objeto creado\n");
            print("");

        }

        public function Conexion($db_hosp, $db_nombrep, $db_userp, $db_passwordp){

            $this->db_host=$db_hosp;
            $this->db_nombre=$db_nombrep;
            $this->db_user=$db_userp;
            $this->db_password=$db_passwordp;

            $this->conexion=new mysqli($db_hosp, $db_userp, $db_passwordp, $db_nombrep);
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }

        public function Obtener_conexion(){
            print("conexion establecida");
            return $this->conexion;
        }

        public function __destruct() {
            // Cerrar la conexión cuando el objeto se destruye
            if ($this->conexion) {
                $this->conexion->close();
            }
        }

        public function consultas($consultap){

            $resultado=mysqli_query($this->conexion, $consultap);
            $fila=mysqli_fetch_row($resultado);
            echo $fila[0];
            echo $fila[1];
        }

        
    }



?>