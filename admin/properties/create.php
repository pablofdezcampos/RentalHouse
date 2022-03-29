<?php
require '../../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Create</h1>
    <a href="/admin" class="button-yellow"> Go back </a>

    <form class="form">
        <fieldset>
            <legend>General Information</legend>

            <label for="title">Title:</label>
            <input type="text" id="title" placeholder="Property Title">

            <label for="price">Price:</label>
            <input type="number" id="price" placeholder="Property Price" min="200">

            <label for="image">Image:</label>
            <input type="file" id="iamge" accept="image/jpeg, image/png">

            <label for="description">Description:</label>
            <textarea id="description" cols="30" rows="10"></textarea>
        </fieldset>

        <fieldset>
            <legend>Property Information</legend>

            <label for="rooms">Rooms:</label>
            <input type="number" id="rooms" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3">

            <label for="bathrooms">Bathroom:</label>
            <input type="number" id="bathrooms" placeholder="Property Title" min="1" max="10">

            <label for="parking">Parking:</label>
            <input type="number" id="parking" placeholder="Property Title" min="1" max="5">
        </fieldset>

        <fieldset>
            <legend>Seller</legend>

            <select>
                <option value="0" disabled selected>--Select a seller--</option>
                <option value="1">Pablo Fdez Campos</option>
                <option value="2">Álvaro Navas Soto</option>
                <option value="3">Manuel García Alonso</option>
            </select>
        </fieldset>

        <input type="submit" value="Create Property" class="button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>