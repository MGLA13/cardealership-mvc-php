<?php

namespace Model;


class Seller extends ActiveRecord{

    protected static $table = "sellers";
    protected static $DbColumns = ["id","name","last_name","phone_number"];
    
    
    public $id;
    public $name;
    public $last_name;
    public $phone_number;


    public function __construct($args = []){

        //?? es un placeholder, en caso de que no se paso ningun valor en determinada posición del arreglo
        $this -> id = $args["id"] ?? "";
        $this -> name = $args["name"] ?? "";
        $this -> last_name = $args["last_name"] ?? "";
        $this -> phone_number = $args["phone_number"] ?? "";

    }

    public function validations(){

        if(!$this->name){
           self::$errors[] = "You must add the seller name";
        }

        if(!$this->last_name){
            self::$errors[] = "You must add the seller last name";
        }

        if(!$this->phone_number){
            self::$errors[] = "You must add the seller phone number";
        }


        //preg_match, for regular expressions
        if(!preg_match("/[0-9]{10}/", $this->telefono)){
            self::$errors[] = "Incorrect phone number";
        }


         return self::$errors;
    
    }

}