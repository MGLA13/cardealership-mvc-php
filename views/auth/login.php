
<?php 
   
   $auth = $_SESSION["login"] ?? null;
    
   checkAuthentication($auth);

?>


<main class="container section container-center">
    <h1>LogIn as administrative</h1>

    <?php foreach($errors as $error): ?> 

        <div class="alert error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <form class="form my-3" action="/login" method="POST">
        <fieldset>
            <legend>E-mail and password</legend>
            <label for="email">E-mail</label>
            <input type="email" placeholder="Your email" id="email" name="email" required>
                
            <label for="password">Password</label>
            <input type="password" placeholder="Your password" id="password" name="password" required>
                
            <div class="container align-center">
                <input type="submit" value="Log in" class="bg-green">
            </div>
        </fieldset>
    </form>
</main>

