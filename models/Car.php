<?php

namespace Model;



class Car extends ActiveRecord{

   protected static $table = "cars";
   protected static $DbColumns = ["id","title","price","image","description","year","mileage","colour","create_date","seller_id"]; 

   public $id;
   public $title;
   public $price;
   public $image;
   public $description;
   public $year;
   public $mileage;
   public $colour;
   public $create_date;
   public $seller_id;


   public function __construct($args = []){

      //?? es un placeholder, en caso de que no se paso ningun valor en determinada posición del arreglo
      $this -> id = $args["id"] ?? "";
      $this -> title = $args["title"] ?? "";
      $this -> price = $args["price"] ?? "";
      $this -> image = $args["image"] ?? "";
      $this -> description = $args["description"] ?? "";
      $this -> year = $args["year"] ?? "";
      $this -> mileage = $args["mileage"] ?? "";
      $this -> colour = $args["colour"] ?? "";
      $this -> create_date = date("Y/m/d");
      $this -> seller_id = $args["sellerId"] ?? "";
  }

  public function validations(){

      $yearConvert = intval($this->year);

      if(!$this->title){
         self::$errors[] = "You must add a title";
      }

      if(!$this->price){
         self::$errors[] = "You must add a price";
      }else if(!is_numeric($this->price)){
         self::$errors[] = "You must add a quantity in the input price";
      }

      if(!$this->image){
         self::$errors[] = "You must add an image";
      }

      if(strlen($this->description)<50){
         self::$errors[] = "The input description must have for less 50 characterss";
      }

      if(!$this->year){
         self::$errors[] = "You must add the car year";
      }else if(!is_numeric($this->year) || ($yearConvert<1950 || $yearConvert>date("Y"))){
         self::$errors[] = "You must add a valid year";
      }

      if(!$this->mileage){
         self::$errors[] = "You must add the car mileage";
      }else if(!is_numeric($this->mileage)){
         self::$errors[] = "You must add a quantity in the input mileage";
      }

      if(!$this->colour){
         self::$errors[] = "You must add the car colour";
      }

      if(!$this->seller_id){
         self::$errors[] = "You must choose a seller";
      }

      //Retornamos el atributo estático que contiene los psobiles errores
      return self::$errors;
   }

}

