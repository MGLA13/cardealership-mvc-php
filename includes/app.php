

<?php

use Dotenv\Dotenv;
use Model\ActiveRecord;
//__DIR__ to this location file
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'functions.php';
require 'config/database.php';


//Connect to DB
$db = DBconnect();


//Define connection reference with the DB
ActiveRecord::setDB($db);



