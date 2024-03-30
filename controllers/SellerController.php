<?php

namespace Controllers;

use MVC\Router;
use Model\Seller;


class SellerController{

    public static function create(Router $router){
        
        $seller = new Seller;

        $errors = Seller::getErrors();

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
            $seller = new Seller($_POST);

            //Validate inputs
            $errors = $seller->validations();


            //Without errors
            if(empty($errors)){
                $seller->save();
            }
        }

        $router->render("sellers/create",[
            "seller" => $seller,
            "errors" => $errors 
        ]);

    }

    public static function update(Router $router){

        $id = checkOrRedirectGet("/admin");
       
        $seller = Seller::find($id);

        if(!$seller){   
           header("Location: /admin"); 

        }else{

            $errors = Seller::getErrors();

            if($_SERVER["REQUEST_METHOD"] === "POST"){
                
                $seller->syncUp($_POST);

                //Validation
                $errors = $seller->validations();
        
                if(empty($errors)){
        
                    $seller->save();
                }
              
            }
        }


        $router->render("sellers/update",[
            "seller" => $seller,
            "errors" => $errors
        ]);


       
    }

    public static function delete(){
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $id = checkOrRedirectPost("/admin");


            $seller = Seller::find($id);

            if(!$seller){
                header("Location: /admin");
            }else{
                $seller->delete();
            }
            
        }
    }


}