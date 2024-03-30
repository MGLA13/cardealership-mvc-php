
<?php

    function DBconnect(): mysqli {
        
        //Create connection with DB
        $db = new mysqli($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASS'],$_ENV['DB_NAME']);

        $db->set_charset('utf8');

        //Not connection
        if(!$db){
            echo "error no se pudo conectar a la BD";
            exit;
        }

        return $db;
    }


