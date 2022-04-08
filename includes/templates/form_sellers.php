<fieldset>
    <legend>General Information</legend>

    <label for="name">Name:</label>
    <input type="text" id="name" name="seller['name']" placeholder="Name Seller" value="<?php echo sanitization($seller->name); ?>">

    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="seller['surname']" placeholder="Surname Seller" value="<?php echo sanitization($seller->surname); ?>">
</fieldset>

<fieldset>
    <legend>Extra Information</legend>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="seller['phone']" placeholder="Seller Phone" value="<?php echo sanitization($seller->phone) ?>">
</fieldset>