<?php

require '../../includes/app.php';

use App\Propierty;
use Intervention\Image\ImageManagerStatic as Image;

//Check auth user
isAuth();

//Connection to DataBase
$db = connectDataBase();

$propierty = new Propierty;

//Consultation to get the sellers
$consultation = "SELECT * FROM seller";
$result = mysqli_query($db, $consultation);

//Array with errors message
$errors = Propierty::getErrors();

//Execute when the user send the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propierty = new Propierty($_POST['propierty']);

    //Generate unique name
    $imageName = md5(uniqid(rand(), true)) . ".jpg";

    //Resize with intervention/image
    if ($_FILES['propierty']['tmp_name']['image']) {
        $image = Image::make($_FILES['propierty']['tmp_name']['image'])->fit(800, 600);
        $propierty->setImage($imageName);
    }

    //Validation
    $errors = $propierty->validation();

    if (empty($errors)) {
        //Create folder
        if (!is_dir(IMAGE_FOLDER)) {
            mkdir(IMAGE_FOLDER);
        }

        //Save image in the server
        $image->save(IMAGE_FOLDER . $imageName);

        //Save in database
        $result = $propierty->save();

        //Redirect users
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
        <?php include '../../includes/templates/form_propierties.php' ?>
        <input type="submit" value="Create Property" class="button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>