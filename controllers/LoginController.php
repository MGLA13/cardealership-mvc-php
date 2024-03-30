<?php 

namespace Controllers;


use MVC\Router;
use Model\Admin;


class LoginController{

    public static function login(Router $router){

        $errors = Admin::getErrors();

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
           $auth = new Admin($_POST);

           $errors = $auth->validations();

           if(empty($errors)){

            //Check if exists user
            $result = $auth->checkUser();

            if(!$result){
                $errors = Admin::getErrors();
            }else{
                //Check user password correct
                $authenticated = $auth->checkPassword($result);

                if($authenticated){

                    //authenticate user
                    $auth->authenticate();

                }else{
                    //Incorrect password
                    $errors = Admin::getErrors();
                }
                
            }

           }

        }
        
        $router -> render("auth/login",[
            "errors" => $errors 
        ]);
    }


    public static function logout(Router $router){

        session_start();

        $_SESSION = [];

        header("Location: /");

    }



}





