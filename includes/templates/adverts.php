<?php
//Import the connection
require 'includes/config/database.php';
$db = connectDataBase();

//Query DataBase

$query = "SELECT * FROM propierties LIMIT ${limit}";

//Get result
$result = mysqli_query($db, $query);
?>

<div class="container-adverts">
    <?php while ($property = mysqli_fetch_assoc($result)) : ?>
        <div class="advert">

            <img loading="lazy" src="/img/<?php echo $property['image'] ?>" alt="Image">

            <div class="content-advert">
                <h3><?php echo $property['title'] ?></h3>
                <p><?php echo $property['description'] ?></p>
                <p class="price">$<?php echo $property['price'] ?></p>
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

                <a href="advert.php?id=<?php echo $property['id'] ?>" class="button-yellow-block">Show property</a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php
//Close connection
mysqli_close($db);
?>