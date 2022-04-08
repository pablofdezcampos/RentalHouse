<?php
require '../../includes/app.php';

use App\Seller;

isAuth();

$seller = new Seller();

$errors = Seller::getErrors();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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