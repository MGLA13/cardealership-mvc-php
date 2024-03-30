
<main class="container section container-center">
        <h1><?php echo $car->title ?></h1>

        <picture>
            <img loading="lazy" src="images/<?php echo $car->image ?>" alt="Car image">
        </picture>

        <div class="property-summary">
            <p class="price">$<?php echo number_format($car->price) ?></p>
            <ul class="icons-features">
                <li>
                    <img loading="lazy" src="build/img/yearIcon.svg" alt="Year icon">
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
            <p class="description">
                <?php echo $car->description ?>
            </p>
        </div>
    </main>
