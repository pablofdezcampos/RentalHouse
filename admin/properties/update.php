<?php

//Check auth user

use App\Propierty;

require '../../includes/app.php';
isAuth();

//Validation of id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}


//Get data values 
$propierty = Propierty::findById($id);

//Consultation to get the sellers
$consultation = "SELECT * FROM seller";
$result = mysqli_query($db, $consultation);

//Array with errors message
$errors = [];

//Execute when the user send the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Asign fields
    $args = $_POST['propierty'];
    $propierty->syncUp($args);

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
        <?php include '../../includes/templates/form_propierties.php' ?>
        <input type="submit" value="Update Property" class="button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>