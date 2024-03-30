
<fieldset>
    <legend>General information</legend>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Car title" value="<?php echo !$car ? "" : sntz($car->title) ?>">

    <label for="price">Price</label>
    <input type="number" id="price" name="price" placeholder="Car price" min="0" value="<?php echo !$car ? "" : sntz($car->price) ?>">

    <label for="image">Image</label>
    <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg, image/webp">
    <?php if(!empty($car->image)): ?>
        <img class="small-image" src="/images/<?php echo $car->image; ?>" alt="Car image">
    <?php endif; ?>
    
    <label for="description">Description</label>
    <textarea id="description" name="description"><?php echo !$car ? "" : sntz($car->description) ?></textarea>
</fieldset>

<fieldset>
    <legend>Car or truck information</legend>
    <label for="year">Year</label>
    <input type="number" id="year" name="year" placeholder="From 1950 to current year" min="1950" max="<?php echo date("Y") ?>" value="<?php echo !$car ? "" : sntz($car->year) ?>">

    <label for="mileage">Mileage</label>
    <input type="number" id="mileage" name="mileage" placeholder="Example 350000" min="1" value="<?php echo !$car ? "" : sntz($car->mileage) ?>">

    <label for="colour">Colour</label>
    <input type="text" id="colour" name="colour" placeholder="Example gray" value="<?php echo !$car ? "" : sntz($car->colour) ?>">

</fieldset>

<fieldset>
    <legend>Seller</legend>

    <select autocomplete="off" name="sellerId">
        <option value="" disabled selected>--Choose--</option>
        <?php foreach($sellers as $seller) : ?>
            <option <?php echo $car->seller_id==$seller->id ? "selected" : ""; ?> value="<?php echo sntz($seller->id); ?>"><?php echo sntz($seller->name) . " " . sntz($seller->last_name)?></option>
        <?php endforeach; ?>    
    </select>
</fieldset>
