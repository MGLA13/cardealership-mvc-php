<?php

namespace Controllers;

use MVC\Router;
use Model\Car;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;


class CarController{

    //Get the $router from Router.php 
    public static function index(Router $router){

        //Get data from cars model
        $cars = Car::all();

        //Get data from sellers model
        $sellers = Seller::all();

        $result = $_GET["result"] ?? null;

        

        $router->render("cars/admin",[
            "cars" => $cars,
            "sellers" => $sellers,
            "result" => $result,
            "dashboardOption" => true
        ]);
        
    }

    public static function create(Router $router){

        //Create a Car object    
        $car = new Car;

        $sellers = Seller::all();

        $errors = Car::getErrors();

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $car = new Car($_POST);

            $imageName = md5(uniqid(rand(),true)) . ".jpg";
            
            //Validate if exists image in form
            if($_FILES["image"]["tmp_name"]){

                //resize to image with Intervention library
                $image = Image::make($_FILES["image"]["tmp_name"])->fit(800,600);
    
                //Set attribute 'image' in object $car
                $car->setImage($imageName);
            }
    
            //Get errors
            $errors = $car->validations();

        
            if(empty($errors)){
    
                //Check if exists directory
                if(!is_dir(IMAGES_DIRECTORY)){
                  mkdir(IMAGES_DIRECTORY); 
                }
    
                //Upload image with Intervention
                $image->save(IMAGES_DIRECTORY . $imageName); 
          
                $car->save();
            }
        }
        
        $router->render("cars/create",[
           "car" => $car,
           "sellers" => $sellers,
           "errors" => $errors 
        ]);

    }

    public static function update(Router $router){

        $id = checkOrRedirectGet("/admin");

        $car = Car::find($id);

        //If not found a car
        if(!$car){
            header("Location: /admin"); 
        }else{
            $sellers = Seller::all();

            $errors = Car::getErrors();

            if($_SERVER["REQUEST_METHOD"] === "POST"){

                $car->syncUp($_POST);

                $imageName = md5(uniqid(rand(),true)) . ".jpg";
            
                if($_FILES["image"]["tmp_name"]){

                    $image = Image::make($_FILES["image"]["tmp_name"])->fit(800,600);
            
                    $car->setImage($imageName);
                }
            
                $errors = $car->validations();
            
            
                if(empty($errors)){
            
                    //Save image, if upload a new image the user
                    if($_FILES["image"]["tmp_name"]){
                        $image->save(IMAGES_DIRECTORY . $imageName);
                    }
            
                    $car->save();
            
                }

            }
        }

        
        $router->render("cars/update",[
            "car" => $car,
            "sellers" => $sellers,
            "errors" => $errors
        ]);
    }

    public static function delete(Router $router){


        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $id = checkOrRedirectPost("/admin");


            $car = Car::find($id);

            if(!$car){
                header("Location: /admin");
            }else{
                $car->delete();
            }
            
        }
    }
} 