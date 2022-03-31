<?php
require 'includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h2>Houses and Apartaments in Sale</h2>
    <?php
    $limit = 100;
    include 'includes/templates/adverts.php';
    ?>
</main>

<?php addTemplate('footer') ?>