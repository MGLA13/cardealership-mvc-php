
<main class="container section">
    <h1>Main dashboard</h1>

   <?php
    if($result){
        $message = showAlerts(intval($result));

        if($message){ ?>
            <p class="alert success"> <?php echo $message ?></p>
        <?php } 
    }?>

    <div class="links-container">
        <a href="/cars/create" class="bg-green">New car or truck</a>
        <a href="/sellers/create" class="yellow-buttom">New seller</a>
    </div>


    <?php if(!$cars): ?>

        <div class="message-no-carsSellers">
            <h2>No cars or trucks to sell</h2>
            <p>Add cars or trucks to sell soon</p>
        </div>

    <?php else: ?>     
    
        <h2>Cars</h2>

        <div class="container-table">
            <table class="properties">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($cars as $car): ?>
                    <tr>
                    <th><?php echo $car->id; ?></th>
                    <th><?php echo $car->title; ?></th>
                    <th>
                        <img src="/images/<?php echo $car->image; ?>" alt="Car image" class="table-image"> 
                    </th>
                    <th>$ <?php echo number_format($car->price); ?></th>
                    <th>
                        <form action="/cars/delete" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $car->id; ?>">
                            <input type="submit" class="red-buttom-block h-50" value="Delete">
                        </form>
                        <a href="/cars/update?id=<?php echo $car->id; ?>" class="yellow-buttom-block h-50">Update</a>
                    </th> 
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
        
    <?php if(!$sellers): ?>

        <div class="message-no-carsSellers">
            <h2>No sellers</h2>
            <p>Add your sellers that sell cars or trucks</p>
        </div>

    <?php else: ?>
    
        <h2>Sellers</h2>

        <div class="container-table">
            <table class="properties">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone number</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($sellers as $seller): ?>
                    <tr>
                    <th><?php echo $seller->id; ?></th>
                    <th><?php echo $seller->name . " " . $seller->last_name; ?></th>
                    <th><?php echo $seller->phone_number; ?></th>
                    <th>
                        <form action="/sellers/delete" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $seller->id; ?>">
                            <input type="submit" class="red-buttom-block h-50" value="Delete">
                        </form>
                        <a href="/sellers/update?id=<?php echo $seller->id; ?>" class="yellow-buttom-block h-50">Update</a>
                    </th> 
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> 

    <?php endif; ?>    

</main>