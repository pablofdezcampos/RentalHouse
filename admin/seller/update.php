<?php
require '../../includes/app.php';

use App\Seller;

isAuth();

//Validate valid id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

//Get the array of seller
$seller = Seller::findById($id);

$errors = Seller::getErrors();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $args = $_POST['seller'];

    $seller->syncUp($args);

    $errors = $seller->validation();

    if (empty($errors)) {
        $seller->save();
    }
}

addTemplate('header');
?>

<main class="container section">
    <h1>Create New Seller</h1>
    <a href="/admin" class="button-yellow"> Go back </a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <!-- enctype allow to put external files -->
    <form class="form" method="POST" action="/admin/seller/create.php">
        <?php include '../../includes/templates/form_sellers.php' ?>
        <input type="submit" value="Update Seller" class="button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>