<?php
    session_start();

    class Login{
        private $email;
        private $password;

        function inicio(){
            /*$email= $_POST["email"];
            include '../config/seguridad.php';
            $encriptar = new Seguridad();
            $password = $encriptar->encriptarP($_POST["password"]);*/

            include 'conexion.php';
            $conexion = new Conexion();
            include '../config/seguridad.php';
            $limpieza = new Seguridad();
            $password = $limpieza->encriptarP($_POST["password"]);
            $con = $conexion->conectarDB();
            $sql = "SELECT * FROM USUARIOS
            WHERE email='".$_POST['email']."'AND password='".$password."';";
            $resulset = $con->query($sql);

            if($resulset->num_rows>0){
                while($fila=$resulset->fetch_assoc()){
                    $_SESSION["Usuario"]=$fila["id"];
                    header('Location:../carrito/index.php');
                }
            }else{
                $_SESSION["Error"]="Por favor verifique su credencial de acceso.!";
                header('Location:../usuario/usuario.php');
            }
            
            $con->close();
            
        }
    }
    $init = new Login();
    $init->inicio();


?>