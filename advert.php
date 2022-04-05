<?php

//Checking id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location:/');
}


require 'includes/app.php';

//Import the connection
$db = connectDataBase();

$query = "SELECT * FROM propierties WHERE id = ${id}";

$result = mysqli_query($db, $query);

//Check the result, with php oriented objetcs
if ($result->num_rows === 0) {
    header('Location:/');
}

$property = mysqli_fetch_assoc($result);

addTemplate('header');
?>
<main class="container section content-center">
    <h1><?php echo $property['title'] ?></h1>
    <img loading="lazy" src="img/<?php echo $property['image']; ?>" alt="Image">

    <div class="summary-propierty">
        <p class="price"><?php echo $property['price'] ?></p>
        <ul class="icons-features">
            <li>
                <img class="icon" src="build/img/icono_wc.svg" alt="WC Icon">
                <p><?php echo $property['wc'] ?></p>
            </li>
            <li>
                <img class="icon" src="build/img/icono_estacionamiento.svg" alt="WC Icon">
                <p><?php echo $property['parking'] ?></p>
            </li>
            <li>
                <img class="icon" src="build/img/icono_dormitorio.svg" alt="WC Icon">
                <p><?php echo $property['rooms'] ?></p>
            </li>
        </ul>

        <p>
            <?php echo $property['description'] ?>
        </p>
    </div>

</main>

<?php
mysqli_close($db);
addTemplate('footer')
?>