
<main class="container section">
    <h1>Update seller</h1>
    <a href="/admin" class="bg-green">Back to dashboard</a>

    <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>    

    <form class="form" method="POST">
            
        <?php include __DIR__ . "/form.php" ?>

        <div class="align-right my-3">
            <input type="submit" class="bg-green" value="Update info seller">
        </div>

    </form>
</main>