<fieldset>
    <legend>General Information</legend>

    <label for="title">Title:</label>
    <input type="text" id="title" name="propierty[title]" placeholder="Property Title" value="<?php echo sanitization($propierty->title); ?>">

    <label for="price">Price:</label>
    <input type="number" id="price" name="propierty[price]" placeholder="Property Price" min="50000" value="<?php echo sanitization($propierty->price); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" name="propierty[image]" accept="image/jpeg, image/png">
    <?php if ($propierty->image) { ?>
        <img src="/img/<?php echo $propierty->image ?>" class="small-image" alt="Image">
    <?php } ?>

    <label for="description">Description:</label>
    <textarea id="description" name="propierty[description]"><?php echo sanitization($propierty->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Property Information</legend>

    <label for="rooms">Rooms:</label>
    <input type="number" id="rooms" name="propierty[rooms]" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo sanitization($propierty->rooms); ?>">

    <label for="wc">Bathrooms:</label>
    <input type="number" id="bathrooms" name="propierty[wc]" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo sanitization($propierty->wc); ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="propierty[parking]" placeholder="Property Title" min="1" max="5" placeholder="Ex: 3" value="<?php echo sanitization($propierty->parking); ?>">
</fieldset>

<fieldset>
    <legend>Seller</legend>

    <label for="">Seller</label>
    <select name="propierty[sellerId]" id="seller">
        <option value="">-- Select a seller --</option>
        <?php foreach ($sellers as $seller) { ?>
            <option <?php echo $propierty->sellerId === $seller->id ? 'selected' : ''; ?> value="<?php echo sanitization($seller->id) ?>">
                <?php echo sanitization($seller->name) . " " . sanitization($seller->surname); ?>
            </option>
        <?php } ?>
    </select>

</fieldset>