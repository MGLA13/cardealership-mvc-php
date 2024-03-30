<?php

//Aqui se almacenan todos las URL´s asociados al sitio web, cada URL tmb asociada a un controller
namespace MVC;

class Router{


    public $rutasGET = [];
    public $rutasPOST = [];

    //Este método servira para todas las URL que reaccionan a un método GET
    //$url, corresponde a la rutas y $fn a la función (controller) asociado a ese endpoint 
    public function get($url, $fn){

        //Guardamos la ruta con su función asociada en un array asociativo
        $this->rutasGET[$url] = $fn;

    }

    public function post($url, $fn){

        $this->rutasPOST[$url] = $fn;

    }

    //Este método verifica las rutas definidas en el router y que soporten ya sea GET o POST 
    //Comprobar la ruta actual visitada para obtener la función asociada a esta 
    public function checkRoutes(){

        session_start();

        //verificar si hay un usuario autenticado
        $auth = $_SESSION["login"] ?? null;

        //Arreglo rutas protegidas
        $protected_routes = ["/admin","/cars/create","/cars/update","/cars/delete","/sellers/create","/sellers/update","/sellers/delete"];
        
        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $HttpMethod = $_SERVER["REQUEST_METHOD"];

        if($HttpMethod == "GET"){
            //null en caso de que no exista la ruta en el router
           $fn = $this->rutasGET[$currentUrl] ?? null;
        }else{
            $fn = $this->rutasPOST[$currentUrl] ?? null;
        }

        //Proteger las rutas
        if(in_array($currentUrl, $protected_routes) && !$auth){ //true si el elmento(primer parametro) esta en el arreglo (segundo parametro)

            header("Location: /");

        }//false no esta en el arreglo el elemento ($urlActual)
        
        //La URL existe y hay una función asociada
        if($fn){

           //Nos permite llamar una función cuando no sabemos como se llama 
           //Pasamos como parametro a la función $fn, el router
           call_user_func($fn, $this); 

        }else{
            echo "Error 404 ¡Sorry! Page Not Found";
        }
        
    }

    //Mostrar una vista
    //Recibe como parametro una vista y un conjunto de datos provenientes del modelo asociado a esta vista
    public function render($view, $data = []){

        //Los datos recibidos provenientes del modelo, a estar en un array asociativo son iterados con foreach
        //el iterar estos datos nos servira para ir creando las diferentes variables correspondiente a cada key de los datos recibidos
        //y cada una de esas variables creadas estaran disponibles en la vista para ser usadas
        foreach($data as $key => $value){
            //$$, es una variable de la variable
            //El $$ es el que nos permite crear diferentes variables que tomaran por nombre la misma key que se este iterando y su valor
            //sera el $value en turno tmb
            $$key = $value;
        }
        

        //Iniciamos un almacenamiento en memoria
        //En este caso se guarda la vista a renderizar
        ob_start();
        include __DIR__ . "/views/$view.php";

        //Lo almacenado previamente se guarda en esta variable
        //  Ademas de que limpia lo que se almaceno en memoria para evitar sobrecarga del servidor
        $content = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }

}
