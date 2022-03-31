<?php

//Check auth user
require '../../includes/functions.php';
$auth = isAuth();

if (!$auth) {
    header('Location: /');
}

//Validation of id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

//Connection to DataBase
require '../../includes/config/database.php';
$db = connectDataBase();

//Get data values (We can use same variable´s name because of fetch)
$consult = "SELECT * FROM propierties WHERE id = ${id}";
$result = mysqli_query($db, $consult);
$propierty = mysqli_fetch_assoc($result);

//Consultation to get the sellers
$consultation = "SELECT * FROM seller";
$result = mysqli_query($db, $consultation);

//Array with errors message
$errors = [];

$title = $propierty['title'];
$price = $propierty['price'];
$description = $propierty['description'];
$rooms = $propierty['rooms'];
$wc = $propierty['wc'];
$parking = $propierty['parking'];
$sellerId = $propierty['sellerId'];
$propiertyImage = $propierty['image'];

//Execute when the user send the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Sanitization to prevent SQL Injection -> mysqli_real_scape_string
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $rooms = mysqli_real_escape_string($db, $_POST['rooms']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $parking = mysqli_real_escape_string($db, $_POST['parking']);
    $sellerId = isset($_POST['seller']);

    $image = $_FILES['image'];

    if (!$title) {
        $errors[] = 'You must add a title';
    }

    if (!$price) {
        $errors[] = 'The price is required';
    }

    if (strlen($description) < 5) {
        $errors[] = 'You have to add a description';
    }

    if (!$rooms) {
        $errors[] = 'Rooms are required';
    }

    if (!$wc) {
        $errors[] = 'Bathrooms are required';
    }

    if (!$parking) {
        $errors[] = 'The parking is required';
    }

    if (!$sellerId) {
        $errors[] = 'Choose a seller';
    }

    //Validate image by size
    $size = 1000 * 1000; //1mb max
    if ($image['size'] > $size) {
        $errors[] = 'The image weigth to much';
    }

    if (empty($errors)) {

        /* Upload files */

        //Create folder
        $folder = '../../img/';

        if (!is_dir($folder)) {
            mkdir($folder);
        }

        $imageName = '';

        //Check if there is a new image. If it is, delete the image in the container folder
        if ($image['name']) {
            unlink($folder . $propierty['image']);

            //Generate unique name
            $imageName = md5(uniqid(rand(), true)) . ".jpg";

            //Upload file (Move the file to the folder we put)
            move_uploaded_file($image['tmp_name'], $folder . $imageName);

            //Else if we do not select a new image. Put the image that was before.
        } else {
            $imageName = $propierty['image'];
        }

        //Insert into database
        $query = "UPDATE propierties SET title = '${title}', price = '${price}', image = '${imageName}', 
                description = '${description}', rooms = ${rooms}, wc = ${wc}, parking = ${parking}, 
                sellerId = ${sellerId} WHERE id = ${id}";
        //Redirect users
        $result = mysqli_query($db, $query);
        var_dump($result);
        if ($result) {
            header('Location: /admin?result=2');
        }
    }
}

addTemplate('header');
?>

<main class="container section">
    <h1>Update Property</h1>
    <a href="/admin" class="button-yellow"> Go back </a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <!-- enctype allow to put external files -->
    <form class="form" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>General Information</legend>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Property Title" value="<?php echo $title; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Property Price" min="50000" value="<?php echo $price; ?>">

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/jpeg, image/png">
            <img src="/img/<?php echo $propiertyImage ?>" alt="Image" class="small-image">

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

            <select name="seller" title="seller">
                <option value="0" disabled selected>--Select a seller--</option>
                <?php while ($seller = mysqli_fetch_assoc($result)) : ?>
                    <option <?php echo $sellerId === $seller['id'] ? 'selected' : ''; ?> value="<?php echo $seller['id']; ?>">
                        <?php echo $seller['name'] . " " . $seller['surname'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Update Property" class="button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>