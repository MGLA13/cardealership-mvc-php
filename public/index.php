
<?php


require_once __DIR__ . '/../includes/app.php';

//Import Router and Controllers
use MVC\Router;
use Controllers\CarController;
use Controllers\SellerController;
use Controllers\PageController;
use Controllers\LoginController;

$router = new Router();

//Private zone
$router->get("/admin",[CarController::class,"index"]);
$router->get("/cars/create",[CarController::class,"create"]);
$router->get("/cars/update",[CarController::class,"update"]);

$router->post("/cars/create",[CarController::class,"create"]);
$router->post("/cars/update",[CarController::class,"update"]);
$router->post("/cars/delete",[CarController::class,"delete"]);

$router->get("/sellers/create",[SellerController::class,"create"]);
$router->get("/sellers/update",[SellerController::class,"update"]);


$router->post("/sellers/create",[SellerController::class,"create"]);
$router->post("/sellers/update",[SellerController::class,"update"]);
$router->post("/sellers/delete",[SellerController::class,"delete"]);

//Public zone
$router->get("/",[PageController::class,"index"]);
$router->get("/about-us",[PageController::class,"aboutUs"]);
$router->get("/cars",[PageController::class,"cars"]);
$router->get("/car",[PageController::class,"car"]);
$router->get("/blog",[PageController::class,"blog"]);
$router->get("/entrance",[PageController::class,"entrance"]);
$router->get("/contact",[PageController::class,"contact"]);
$router->post("/contact",[PageController::class,"contact"]);

//Login and authentication
$router->get("/login",[LoginController::class,"login"]);
$router->get("/logout",[LoginController::class,"logout"]);

$router->post("/login",[LoginController::class,"login"]);


$router -> checkRoutes();