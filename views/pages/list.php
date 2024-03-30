

<div class="container <?php echo $start ? "ads-container-index" : "ads-container" ?>">

    <?php foreach($cars as $car): ?>

    <div class="ad">
        <picture class="ad-image-container">
            <img loading="lazy" src="/images/<?php echo $car->image ?>" alt="Car image">
        </picture>
       <div class="ad-container">
            <h3><?php echo $car->title; ?></h3>
            <div class="description">
                <p><?php echo $car->description ?></p>
            </div>
            <p class="price">$<?php echo number_format($car->price) ?></p>
            <ul class="icons-features">
                <li>
                    <img loading="lazy" src="/build/img/yearIcon.svg" alt="Year icon">
                    <p><?php echo $car->year ?></p>
                </li>
                <li>
                    <img loading="lazy" src="/build/img/mileageIcon.svg" alt="Mileage icon">
                    <p><?php echo number_format($car->mileage) ?></p>
                 </li>
                <li>
                    <img loading="lazy" src="/build/img/colourIcon.svg" alt="Colour icon">
                    <p><?php echo $car->colour ?></p>
               </li>
            </ul>
            <a href="/car?id=<?php echo $car->id ?>" class="yellow-buttom-block">
                view car 
            </a>
       </div>
    </div>

    <?php endforeach; ?>
 </div>