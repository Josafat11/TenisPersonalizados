<?php
//esta constante la ocupamos para generar las rutas a acceder
    define('controladores','app/Controller/');
    //verificamos que se haya pasado la variable C por la url ($_GET['C'])
    //con un if normal
    /*if(isset($_GET['C'])){
        $control=$_GET['C'];
    }else{ 
        $control='';
    }*/
    //con operador ternario
    $control=isset($_GET['C'])?$_GET['C']:'';
    //armamos la ruta que se va a seguir
    $ruta=controladores.$control.".php";
    //verificamos que exusta el archivo de ruta o que no se haya ido en blanco
    if(!empty($control) && file_exists($ruta)){
        include_once($ruta);
        $objeto=new $control();
        //verificamos que se haya pasado el metdo por la url 
        $metodo=isset($_GET['M'])?$_GET['M']:'';
        //verificamos que lo que se paso exista 
        if(!empty($_GET['M']) && method_exists($objeto,$metodo)){
            //ejecutamos el metdo del objeto
            $objeto->$metodo();
        }
    }else{
        //llamamos al controlador por default
        require_once("app/Controller/DefaultController.php");
        $index=new DefaultController(); 
        $index->index();
    }

?>