<fieldset>
    <legend>General Information</legend>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" placeholder="Property Title" value="<?php echo sanitization($propierty->title); ?>">

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" placeholder="Property Price" min="50000" value="<?php echo sanitization($propierty->price); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" accept="image/jpeg, image/png">

    <label for="description">Description:</label>
    <textarea id="description" name="description"><?php echo sanitization($propierty->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Property Information</legend>

    <label for="rooms">Rooms:</label>
    <input type="number" id="rooms" name="rooms" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo sanitization($propierty->rooms); ?>">

    <label for="wc">Bathrooms:</label>
    <input type="number" id="bathrooms" name="wc" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo sanitization($propierty->wc); ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="parking" placeholder="Property Title" min="1" max="5" placeholder="Ex: 3" value="<?php echo sanitization($propierty->parking); ?>">
</fieldset>

<fieldset>
    <legend>Seller</legend>

    <!-- name of the field of database -->
    <!-- <select name="sellerId" title="seller">
        <option value="0" disabled selected>--Select a seller--</option>
        <?php while ($seller = mysqli_fetch_assoc($result)) : ?>
            <option <?php echo $sellerId === $seller['id'] ? 'selected' : ''; ?> value="<?php echo sanitization($propierty->seller['id']); ?>">
                <?php echo $seller['name'] . " " . $seller['surname'] ?>
            </option>
        <?php endwhile; ?>
    </select> -->
</fieldset>