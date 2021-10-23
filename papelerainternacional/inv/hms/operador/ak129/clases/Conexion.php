<?php

    class Conexion{

        //Atributos
        private $host;
        private $user;
        private $pass;
        private $bd;

        //Metodos
        public function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->bd = "hms";

            $con = mysqli_connect($this->host, $this->user, $this->pass);

            if(!$con){
                echo "Error: No se pudo conectar a mysql." . PHP_EOL;
                echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                exit; 
            }

                        
            }

            public function consultaSimple($sql){
                
                $conexion = new mysqli("localhost", "root", "", "hms");
                
                $resultado = $conexion->query($sql);
                
            }

            public function consultaRetorno($sql){
                
                $conexion = new mysqli("localhost", "root", "", "hms");
                
                $resultado = $conexion->query($sql);
                
                return $resultado;

            }

            
                    
        }
?>
