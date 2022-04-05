<?php

require '../../includes/app.php';

use App\Propierty;

//Check auth user
isAuth();

//Connection to DataBase
$db = connectDataBase();

//Consultation to get the sellers
$consultation = "SELECT * FROM seller";
$result = mysqli_query($db, $consultation);

//Array with errors message
$errors = Propierty::getErrors();

$title = '';
$price = '';
$description = '';
$rooms = '';
$wc = '';
$parking = '';
$sellerId = '';

//Execute when the user send the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propierty = new Propierty($_POST);

    //Validation
    $errors = $propierty->validation();

    if (empty($errors)) {

        $propierty->save();

        $image = $_FILES['image'];

        /* Upload files */

        //Create folder
        $folder = '../../img/';

        if (!is_dir($folder)) {
            mkdir($folder);
        }

        //Generate unique name
        $imageName = md5(uniqid(rand(), true)) . ".jpg";

        //Upload file
        move_uploaded_file($image['tmp_name'], $folder . $imageName);

        //Insert into database
        $query = "INSERT INTO propierties (title, price, image, description, rooms, wc, parking, sellerId) 
        VALUES ('$title', '$price', '$imageName' , '$description', '$rooms', '$wc', '$parking', '$sellerId')";

        $result = mysqli_query($db, $query);

        //Redirect users
        var_dump($result);
        if ($result) {
            header('Location: /admin?result=1');
        }
    }
}

addTemplate('header');
?>

<main class="container section">
    <h1>Create</h1>
    <a href="/admin" class="button-yellow"> Go back </a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <!-- enctype allow to put external files -->
    <form class="form" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">
        <fieldset>
            <legend>General Information</legend>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Property Title" value="<?php echo $title; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Property Price" min="50000" value="<?php echo $price; ?>">

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/jpeg, image/png">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $description; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Property Information</legend>

            <label for="rooms">Rooms:</label>
            <input type="number" id="rooms" name="rooms" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo $rooms; ?>">

            <label for="wc">Bathrooms:</label>
            <input type="number" id="bathrooms" name="wc" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo $wc; ?>">

            <label for="parking">Parking:</label>
            <input type="number" id="parking" name="parking" placeholder="Property Title" min="1" max="5" placeholder="Ex: 3" value="<?php echo $parking; ?>">
        </fieldset>

        <fieldset>
            <legend>Seller</legend>

            <!-- name of the field of database -->
            <select name="sellerId" title="seller">
                <option value="0" disabled selected>--Select a seller--</option>
                <?php while ($seller = mysqli_fetch_assoc($result)) : ?>
                    <option <?php echo $sellerId === $seller['id'] ? 'selected' : ''; ?> value="<?php echo $seller['id']; ?>">
                        <?php echo $seller['name'] . " " . $seller['surname'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Create Property" class="button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>