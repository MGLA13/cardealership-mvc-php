<?php
//Página maestra que incluira tanto el header como el footer, y solo se le haran pequeños cambios

    if(!isset($_SESSION)){  
            
        //Siempre que se desee acceder a la información de la sesión almacenada, es decir acceder a $_SESSION
        //se debe usar iniciar una sesión con session_start() 
        session_start();
    // echo "session_start() no ha sido utilizado previamente en el archivo";
    }/*else{
        echo "session_start() ya ha sido utilizado previamente en el archivo";
    } */
    $auth = $_SESSION["login"] ?? null; //null similar a false
    if(!isset($start)){
        $start = false;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car dealership</title>
    <link rel="shortcut icon" type="image/jpg" href="/build/img/blog1.jpg">
    <link rel="stylesheet" href="/build/css/app.css?v=<?php echo time(); ?>">
</head>


<body>

 <header class="header<?php echo $indexBackground ? ' start' : ''?>">
    <div class="container header-container">
        <div class="bar">
            <a class="logo" href="/">
                <img src="/build/img/logo.png" alt="Logo">
            </a>
            <div class="mobile-menu">
                <img src="/build/img/barrs.svg" alt="Options menu">
            </div>
            <div class="right">
                <img class="dark-mode-button" src="/build/img/dark-mode.svg" alt="Dark mode">
                <nav class="navegation">
                    <?php if($auth && !isset($dashboardOption)): ?>
                        <a href="/admin">Dashboard</a>
                    <?php endif; ?>
                    <a href="/about-us">About us</a>
                    <a href="/cars">Ads</a>
                    <a href="/blog">Blog</a>
                    <?php if(!$auth): ?>
                        <a href="/contact">Contact</a>        
                    <?php endif; ?>
                    <?php if($auth): ?>
                        <a href="/logout">Log out</a>
                    <?php endif; ?>
                </nav>
            </div>
                
        </div>

        <?php if($indexBackground){ ?>
            <h1>Sales of cars and trucks for affordable prices</h1>
        <?php } ?>
    </div>
</header>


<?php

echo $content;

?>




<footer class="footer section">

    <div class="container footer-container">
        <nav class="navegation">
            <a href="/about-us">About us</a>
            <a href="/cars">Ads</a>
            <a href="/blog">Blog</a>
            <a href="/contact">Contact</a>
        </nav>
    </div>

    <p class="copyright">All rights reserved <?php echo date("Y");?> &copy;</p>
</footer>

<script src="/build/js/bundle.min.js?v=<?php echo time(); ?>"></script>

    
</body>

</html>