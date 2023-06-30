<?php
    class UserModel{
        //creamos un atributo para manipular los datos en la bd
        private $UserConnection;

        //definimos el contructor de la clase usermodel
        public function __construct(){
            //requiero la clase dbconnection 
            require_once('app/config/DBConnection.php');
            //instranciamos userconnection con dbconnection 
            $this->UserConnection=new DBConnection();
        }

        //a partir de esto vienen los metodos logicos de la app

        //metodo para obtener todos los usuarios
        public function getAll(){
            //paso 1 creo la consulta
            $sql="SELECT * FROM usuarios";
            //paso 2 llamo a la conneccion 
            $connection =$this->UserConnection->getconnection();
            //paso 3 ejecuto la consulta
            $result=$connection->query($sql);
            //paso 4 verifico y acomodo datos 
            //paso 4.1 creo un arreglo para almacenar los usuarios de la bd 
            $users=array();
            //tengo que recorrer $result para ir extrayendo los renglones (registros de usuarios)
            //ocupare un while y la instruccion fetch_assoc
            while($user=$result->fetch_assoc()){
                $users[]=$user;
            }
            //paso 5 cierro la coneccion 
            $this->UserConnection->closeConecction();
            //paso 6 arrojo resultados
            return $users;
        }

        //getById metodo que extrae un usuario por su id
        public function getById($id){
            //paso 1 creamos la consulta
            $sql="SELECT * FROM usuarios WHERE ID = $id";
            //paso 2 obtenemos la coneccion
            $connection=$this->UserConnection->getConnection();
            //paso 3 ejecutamos la consulta
            $result=$connection->query($sql);
            //paso 4 verificamos que existan resultados
            if($result && $result->num_rows >0){
                $user=$result->fetch_assoc();                
            }else{
                $user=false;
            }
            //paso 5 cerramos la coneccion
            $this->UserConnection->closeConecction();
            //paso 6
            return $user;
        }

        //metodo para verificar credenciales de logeo
        public function getCredentials($us,$ps){
            //paso 1 creamos la consulta
            $sql="SELECT * FROM usuarios WHERE nombre = '".$us."' AND password = '".$ps."'";
            //paso 2 obtenemos la coneccion
            $connection =$this->UserConnection->getconnection();
            //paso 3 ejecutamos la consulta
            $result=$connection->query($sql);
            //paso 4 verificamos que existan resultados
            if($result && $result->num_rows >0){
                $user=$result->fetch_assoc();                
            }else{
                $user=false;
            }
            //paso 5 cerramos la coneccion
            $this->UserConnection->closeConecction();
            //paso 6 arrojamos el resultado
            return $user;
        }

        //metodo para insertar usuarios
        public function insertUser($nombre, $password){
            // Paso 1: Crear la consulta INSERT
            $sql = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre', '$password')";
            // Paso 2: Obtener la conexión
            $connection = $this->UserConnection->getConnection();
            // Paso 3: Ejecutar la consulta
            $result = $connection->query($sql);
            // Paso 4: Verificar si la inserción fue exitosa
            $success = ($result === true);
            // Paso 5: Cerrar la conexión
            $this->UserConnection->closeConecction();
            // Paso 6: Retornar el resultado de la inserción
            return $success;
        }

        //metodo para editar usuarios
        public function updateUser($id, $nombre, $password){
            // Paso 1: Crear la consulta UPDATE
            $sql = "UPDATE usuarios SET nombre = '$nombre', password = '$password' WHERE ID = $id";
            // Paso 2: Obtener la conexión
            $connection = $this->UserConnection->getConnection();
            // Paso 3: Ejecutar la consulta
            $result = $connection->query($sql);
            // Paso 4: Verificar si la actualización fue exitosa
            $success = ($result === true);
            // Paso 5: Cerrar la conexión
            $this->UserConnection->closeConecction();
            // Paso 6: Retornar el resultado de la actualización
            return $success;
        }

        //metodo para eliminar usuarios
        public function deleteUser($id){
            // Paso 1: Crear la consulta DELETE
            $sql = "DELETE FROM usuarios WHERE ID = $id";
            // Paso 2: Obtener la conexión
            $connection = $this->UserConnection->getConnection();
            // Paso 3: Ejecutar la consulta
            $result = $connection->query($sql);
            // Paso 4: Verificar si la eliminación fue exitosa
            $success = ($result === true);
            // Paso 5: Cerrar la conexión
            $this->UserConnection->closeConecction();
            // Paso 6: Retornar el resultado de la eliminación
            return $success;
        }
        
        //Metodo para cambiar contraseña
        public function changePassword($id, $newPassword){
            // Paso 1: Crear la consulta UPDATE
            $sql = "UPDATE usuarios SET password = '$newPassword' WHERE ID = $id";
            // Paso 2: Obtener la conexión
            $connection = $this->UserConnection->getConnection();
            // Paso 3: Ejecutar la consulta
            $result = $connection->query($sql);
            // Paso 4: Verificar si la actualización fue exitosa
            $success = ($result === true);
            // Paso 5: Cerrar la conexión
            $this->UserConnection->closeConecction();
            // Paso 6: Retornar el resultado de la actualización
            return $success;
        }

    }
?>