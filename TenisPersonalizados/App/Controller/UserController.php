<?php
require_once("../Model/UserModel.php");
    class UserController{
        private $vista;
        private $modelo;

        public function Index(){
            //en el index vamos a mostrar una tabla con todos los usuarios
            $vista="app/View/IndexUserView.php";

            $modelo=new UserModel();
            $datos=$modelo->getAll();

            include_once("app/View/PlantillaAdminView.php");
        }

        public function CallFormLogin(){
            $vista="app/View/LoginView.php";
            include_once("app/View/PlantillaAdminView.php");
        }

        public function Login(){
            
            $modelo=new UserModel();
            $usuario=$modelo->getCredentials($_POST['user'],$_POST['password']);
            if($usuario==false){
                //llmar a una pantalla de error
                $vista="app/View/ErrorAdminView.php";
            }else{
                //llamar a pantalla pricipal
                //agregamos variables de sesion 
                $vista="app/View/IndexAdminView.php";
            }
            include_once("app/View/PlantillaAdminView.php");
        }
    }
?>