<?php

require 'includes/app.php';

use App\Propierty;

//Checking id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /');
}

$propierty = Propierty::findById($id);

addTemplate('header');
?>
<main class="container section content-center">
    <h1><?php echo $propierty->title ?></h1>
    <img loading="lazy" src="img/<?php echo $propierty->image ?>" alt="Image">

    <div class="summary-propierty">
        <p class="price"><?php echo $propierty->price ?></p>
        <ul class="icons-features">
            <li>
                <img class="icon" src="build/img/icono_wc.svg" alt="WC Icon">
                <p><?php echo $propierty->wc ?></p>
            </li>
            <li>
                <img class="icon" src="build/img/icono_estacionamiento.svg" alt="WC Icon">
                <p><?php echo $propierty->parking ?></p>
            </li>
            <li>
                <img class="icon" src="build/img/icono_dormitorio.svg" alt="WC Icon">
                <p><?php echo $propierty->rooms ?></p>
            </li>
        </ul>

        <p>
            <?php echo $propierty->description ?>
        </p>
    </div>

</main>

<?php
addTemplate('footer')
?>