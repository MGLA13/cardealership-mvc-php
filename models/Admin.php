<?php 

namespace Model;


class Admin extends ActiveRecord{

    //base de datos
    protected static $table = "users";
    protected static $DbColumns = ["id","email","password"];

    public $id;
    public $email;
    public $password;



    public function __construct($args = []){

        $this -> id = $args["id"] ?? "";
        $this -> email = $args["email"] ?? "";
        $this -> password = $args["password"] ?? "";

    }

    public function validations(){

        if(!$this->email){
            self::$errors[] = "The email is obligatory";
        }


        if(!$this->password){
            self::$errors[] = "The input password is obligatory";
        }


        return self::$errors;

    }


    public function checkUser(){

        //Check if the user exists
        $query = "SELECT * FROM " . static::$table . " WHERE email = '" . $this->email . "' LIMIT 1";
        
        $result = self::SqlQuery($query);

        if(!$result){
            self::$errors[] = "The user does not exist";
            
            //Stop execution
            return;
        }

        //Return the object create in the DB to the user search query
        return array_shift($result);

    }


    public function checkPassword($result){

        $user = $result;

        $authenticated = password_verify($this->password,$user->password);

        if(!$authenticated){
            self::$errors[] = "The password is incorrect";
        }

        return $authenticated;

    }


    public function authenticate(){

        session_start();

        //Call $_SESSION array
        $_SESSION["usuer"] =  $this->email;
        $_SESSION["login"] = true;

        header("Location: /admin");

    }

}

