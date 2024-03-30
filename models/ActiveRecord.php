<?php 

namespace Model;


class ActiveRecord {

    protected static $db;

    protected static $table = "";
    
    //Este atributo guarda cada una de las columnas que tiene la tabla de propiedades y vendedores en la BD
    protected static $DbColumns = [];

    //Este atributo se encargara de almacenar los errores que se generen en la validación
    protected static $errors = [];

    
   
    //Definir referencia de conexión a la base de datos, método estático
    public static function setDB($database){

        self::$db = $database;

        //self, se usa para todo lo relacionado a la BD
        //static, todo lo relacionadoa las clases 

    }


    public function save(){

        //Si existe un id en el objeto, significa que este ya esta en la BD, lo que quiere decir que estamos realizando una actualización
        if(!empty($this->id)){
            $this->update();
        }else{
            //retornar (recordar problema de retorno viernes)
           // return $this->crear();
            $this->create();
        }
    }

    public function create(){

        //Sanitizar los datos
        $attributes = $this->sanitizeAttributes();


        //join(), crear un string a partir de una cadena
        //array_keys(), obtiene las llaves de un array asociativo
        //array_values(), obtiene los valores de las llaves de un array asociativo
        //$string = join(", ",array_keys($atributos));


         //Insertar en la base de datos
         //.= es el += de PHP
         //Creamos el query
         $query = "INSERT INTO " . static::$table . " (";
         //Unimos las llaves del arreglo (nombre de los atributos del objeto a insertar) para que estos funcionen como las columnas
         //de la tabla dónde se insertaran los valores  
         $query .= join(", ",array_keys($attributes));
         $query .= ") VALUES ('";
         //Unimos las valores del arreglo (valores de los atributos del objeto a insertar) para que estos funcionen como los valores
         //que se intentaran insertar en la tabla de la BD 
         $query .= join("','",array_values($attributes));
         $query .= "')"; 
   
         //Mostrar consulta 
         //echo $query;


         //mysqli en forma de POO
         //Nos retornara un true o false
         $result = self::$db->query($query);

      
         if($result){
            //redirreccionar al usuario para evitar que el usuario reenvie los mismos datos varias veces mas
            
            //Para mostrar pasar información de una página a otra, usamos el query string ?
            //pasamos un parametro en el query con un valor (de preferencia numeros)  
            header("Location: /admin?result=1");
        }else{
           //debuguear("Error");
        }

    }

    public function update(){

        $attributes = $this->sanitizeAttributes();

        $values = [];

        foreach($attributes as $key => $value){
            $values[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(", ",$values);
        //Sanitizar el id del objeto, ya que este no forma parte de la sanitización hecha previamente
        $query .= " WHERE id = " . self::$db->escape_string($this->id);
        //Recomendado poner un LIMIT para realizar una actualización 
        $query .= " LIMIT 1";

        $result = self::$db->query($query);


        if($result){
            header("Location: /admin?result=2");
        }
    }

    public function delete(){

        $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";

        $result = self::$db->query($query);

        if($result){
            $this->deleteImage();
            header("Location: /admin?result=3");
        }
    }

    //Identificar cada uno de los atributos que tiene el objeto (el cual se intentara insertar en la BD)
    //Los atributos del objeto son almacenados en un array
    public function attributes(){

        $attributes = [];

        foreach(static::$DbColumns as $column){
            //se salta a la siguiente vuelta de ciclo en caso de que se cumpla la condición
            if($column === "id") continue;
            //this->$columna, $columna tendra el nombre del atributo de objeto al cual se quiere acceder
            $attributes[$column] = $this->$column;
        }

        return $attributes;

    }

    public function sanitizeAttributes(){

        //atributos(), retorna un array asociativo
        $attributes = $this->attributes();

        $sanitizeAttributes = [];
        
        //Recorremos el array asociativo
        foreach($attributes as $key => $value){

            //Sanitizamos los atributos mandados por el usuario, para evitar código malicioso
            $sanitizeAttributes[$key] = self::$db->escape_string($value);

        }

        return $sanitizeAttributes;

    }

    //Subida de archivos
    public function setImage($image){

        //Eliminar imagen previa
        //El atributo id estara vacio, cuando se este por insertar una nueva propiedad a la BD
        if(!empty($this->id)){
            
            $this->deleteImage();
        }

        //Asignar al atributo imagen, el nombe de la imagen, para que este nombre puede ser guardado en la BD
        if($image){
            $this -> image = $image;
        }

    }

    public function deleteImage(){
         //Comprobar si existe el archivo
         $fileExists = file_exists(IMAGES_DIRECTORY . $this->image);
         if($fileExists && !empty($this->image)){
             unlink(IMAGES_DIRECTORY . $this->image);
         }
    }
    
    public static function getErrors(){


        return static::$errors; 
    }


    public function validations(){
        
        //Reasignamos el atributo estático errores
        static::$errors = [];

        //Retornamos el atributo estático que contiene los posibles errores
        return static::$errors;
    }

    //Listar u obtener todas las propiedades almacenadas en la BD
    public static function all(){
        
       //el modificador de acceso static, sirve para heredar este método y va a buscar el atributo que se indique en la 
       //clase que se este heredando, en este caso se esta indicando el atributo $tabla   
       $query = "SELECT * FROM " . static::$table;

       
       $result = self::SqlQuery($query);

       return $result; 
    }

    //Listar u obtener determinado numero de registros en la BD (sirve para la el index principal)
    public static function get($limit){
        
        //el modificador de acceso static, sirve para heredar este método y va a buscar el atributo que se indique en la 
        //clase que se este heredando, en este caso se esta indicando el atributo $tabla   
        $query = "SELECT * FROM " . static::$table . " LIMIT " . $limit;
    
        $result = self::SqlQuery($query);
  
        return $result; 
     }

    //Obtener una propiedad en concreto
    public static function find($id){

        $query = "SELECT * FROM " . static::$table . " WHERE id = " . $id;
    
        $result = self::SqlQuery($query);

        //array_shift, retorna el primer elemento de un array
        //Se retorna un objeto
        return array_shift($result);
    
    }

    //Este método nos permite realizar diversas consultas a la BD
    public static function SqlQuery($query){

        //Consultar las base de datos
        $result = self::$db->query($query);

        //Iterar resultados
        //En este array se almacenaran cada uno de los objetos creados a partir de los registros obtenidos 
        $array = [];
        //Asignamos a $registro los resultados obtenidos de la consulta despues de haberlos convertido en un array asociativo 
        while($record = $result->fetch_assoc()){
            //Active Record no maneja arrays sino objetos, por lo que debemos convertir cada uno de los arrays (cada array es un registro
            //de la db) a un objeto independiente
            //Aqui debe ser static, porque sino se haria referencia a $registro en esta misma clase 
            $array[] = static::createObject($record);

        }

        //Liberar memoria
        $result->free();


        //retornar los resultados
        return $array;

    }
    
    //Este método tomara los arrays obtenidos despues de haber consultado la BD para convertilos en objetos 
    protected static function createObject($record){  //$registro = cada array obtenido

        //Creamos un nuevo objeto de la clase actual (Propiedad o Vendedor)
        $object = new static;


      
        //Recorremos el array asociativo
        foreach($record as $key => $value){
          if(property_exists($object, $key)){
            $object->$key = $value;
          }
        }

        return $object;

       


        
    } 


    //Sincroniza el objeto en memoeria con los cambios realizados por el usuario
    //Esto sirve para las actualizaciones
    public function syncUp($args = []){

        
        foreach($args as $key => $value){
            if(property_exists($this, $key)){
               $this->$key = $value; 
            }
        }


    }



}