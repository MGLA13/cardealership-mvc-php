<?php

namespace Controllers;


use MVC\Router;
use Model\Car;
use PHPMailer\PHPMailer\PHPMailer;

class PageController{

    public static function index(Router $router){

        $cars = Car::get(3);
        $indexBackground = true;

        
        $router->render("pages/index",[
            "cars" => $cars,
            "indexBackground" => $indexBackground
        ]);
        
    }


    public static function aboutUs(Router $router){

        $router->render("pages/about-us");
        
    }


    public static function cars(Router $router){

        $cars = Car::all();

        $router->render("pages/cars",[
            "cars" => $cars
        ]);
    }


    public static function car(Router $router){

        $id = checkOrRedirectGet("/cars");

        $car = Car::find($id);

        if(!$car){
            header("Location: /");
        }

        $router->render("pages/car",[
            "car" => $car
        ]);
    }


    public static function blog(Router $router){

        $router->render("pages/blog");
    }


    public static function entrance(Router $router){

        debug("I still work with this part");

    }


    public static function contact(Router $router){

        $message = null;
    
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $request = $_POST["contact"];
           
            //create instance PHPMailer
            $mail = new PHPMailer();

            //SMTP configuration
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];;
            $mail->SMTPSecure = "tls";
            $mail->Port = $_ENV['EMAIL_PORT'];;

            //Configurate email content
            $mail->setFrom($_ENV['EMAIL_USER']);
            $mail->addAddress($_ENV['EMAIL_MAIL']); 
            $mail->Subject = "You have a new message";
            
            //Active HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            //Content html
            $contenido = "<html>";
            $contenido .= "<h2>You have a new message:</h2>";
            $contenido .= "\t<p> <b>Name: </b>" . $request["name"]. "</p>"; 
            $contenido .= "\t<p> <b>Message: </b>" . $request["message"]. "</p>"; 

            $contenido .= "<h3> Car or Truck Information </h3>"; 
            $contenido .= "\t<p> <b> Orden type: </b>" . $request["type"]. "</p>"; 
            $contenido .= "\t<p> <b>Price: </b>" . $request["price"]. "</p>"; 

            $contenido .= "<h3>Contact by</h3>";
            //Sent conditionally fields
            if($request["contact"] === "phone_number"){
                $contenido .= "\t<p> <b> Phone number: </b>" . $request["phone_number"] . "</p>";    
                $contenido .= "\t<p> <b> Contact date: </b>" . $request["date"] . "</p>";    
                $contenido .= "\t<p> <b> Contact time: </b>" . $request["time"] . "</p>";    

            }else{
                $contenido .= "\t<p> <b> E-mail: </b>" . $request["email"] . "</p>";    
            }


            $mail->Body = $contenido;

            //Send email
            if($mail->send()){
                $message = "Message has been send";
            }else{
                $message = "Message has not been send";
            }
        }

        $router->render("pages/contact",[
            "message" => $message
        ]);
    }

}