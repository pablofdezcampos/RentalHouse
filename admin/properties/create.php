<?php
//DataBase
require '../../includes/config/database.php';
$db = connectDataBase();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";

    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $rooms = $_POST['rooms'];
    $wc = $_POST['wc'];
    $parking = $_POST['parking'];
    $sellerId = $_POST['seller'];

    //Insert into database
    $query = "INSERT INTO propierties (title, price, description, rooms, wc, parking, sellerId) 
    VALUES ( '$title', '$price', '$description', '$rooms', '$wc', '$parking', '$sellerId')";

    $result = mysqli_query($db, $query);
}

require '../../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Create</h1>
    <a href="/admin" class="button-yellow"> Go back </a>

    <form class="form" method="POST" action="/admin/properties/create.php">
        <fieldset>
            <legend>General Information</legend>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Property Title">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Property Price" min="200">

            <label for="image">Image:</label>
            <input type="file" id="image" accept="image/jpeg, image/png">

            <label for="description">Description:</label>
            <textarea id="description" name="description" cols="30" rows="10"></textarea>
        </fieldset>

        <fieldset>
            <legend>Property Information</legend>

            <label for="rooms">Rooms:</label>
            <input type="number" id="rooms" name="rooms" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3">

            <label for="wc">Bathrooms:</label>
            <input type="number" id="bathrooms" name="wc" placeholder="Property Title" min="1" max="10">

            <label for="parking">Parking:</label>
            <input type="number" id="parking" name="parking" placeholder="Property Title" min="1" max="5">
        </fieldset>

        <fieldset>
            <legend>Seller</legend>

            <select name="seller">
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