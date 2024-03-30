

<?php


//  Define constants
define ('FUNCIONS_URL',__DIR__ . 'funciones.php');
define ('IMAGES_DIRECTORY',$_SERVER["DOCUMENT_ROOT"] . '/images/');
//$_SERVER["DOCUMENT_ROOT"], get url to public directory



//Check authentication of admin
function checkAuthentication($auth){
    
    if($auth){
        header("Location:/admin");
    }
}


//Show value of a variable or object
function debug($variable){

    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}


//Escape HTML
function sntz($html) : string{

    $htmlSanitize = htmlspecialchars($html);

    return $htmlSanitize;

}

//Check content type (value) of a hidden input in a form
function checkInputValue($type){

    $types = ["seller", "car"];

    return in_array($type,$types);

}


//Show messages
function showAlerts($code){

    $message = "";

    switch($code){

        case 1:
            $message = "Created correctly";
            break;
        case 2:
            $message = "Updated correctly";
            break;
        case 3:    
            $message = "Deleted correctly";
            break;
        default:
            $message = false;
            break;            

    }

    return $message;

}


//Check id value with get method
function checkOrRedirectGet(string $url){

    $id = $_GET["id"];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header("Location:" . $url);
    }

    return $id;
}


//Check id value with post method
function checkOrRedirectPost(string $url){

    $id = $_POST["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
       header("Location:" . $url);
    }

    return $id;

}
