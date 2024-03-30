<fieldset>
    <legend>General information</legend>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Seller name" value="<?php echo !$seller ? "" : sntz($seller->name) ?>">

    <label for="last_name">Last name</label>
    <input type="text" id="last_name" name="last_name" placeholder="Seller last name" value="<?php echo !$seller ? "" : sntz($seller->last_name) ?>">
    
</fieldset>

<fieldset>
    <legend>Aditional information</legend>
    <label for="phone_number">Phone number</label>
    <input type="tel" id="phone_number" name="phone_number" placeholder="Seller phone number" value="<?php echo !$seller ? "" : sntz($seller->phone_number) ?>">
</fieldset>