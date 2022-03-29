<?php
$result = $_GET['result'] ?? null;
require '../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Admin</h1>
    <?php if (intval($result) === 1) : ?>
        <p class="alert success">Correctly advert creation</p>
    <?php endif ?>
    <a href="/admin/properties/create.php" class="button-green-inline">Create</a>
</main>

<?php
addTemplate('footer');
?>