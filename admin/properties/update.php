<?php

//Check auth user

use App\Propierty;
use Intervention\Image\ImageManagerStatic as Image;

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
$errors = Propierty::getErrors();

//Execute when the user send the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Asign fields
    $args = $_POST['propierty'];
    $propierty->syncUp($args);

    //Validation
    $errors = $propierty->validation();

    //Generation of a unique name
    $imageName = md5(uniqid(rand(), true)) . ".jpg";

    //Upload files
    if ($_FILES['propierty']['tmp_name']['image']) {
        $image = Image::make($_FILES['propierty']['tmp_name']['image'])->fit(800, 600);
        $propierty->setImage($imageName);
    }

    if (empty($errors)) {
        //Store image
        if ($_FILES['propierty']['tmp_name']['image']) {
            $image->save(IMAGE_FOLDER . $imageName);
        }
        $propierty->update();
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