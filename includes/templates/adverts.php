<?php

use App\Propierty;

$propierties = Propierty::all();
?>

<div class="container-adverts">
    <?php foreach ($propierties as $propierty) { ?>
        <div class="advert">

            <img loading="lazy" src="/img/<?php echo $propierty->image ?>" alt="Image">

            <div class="content-advert">
                <h3><?php echo $propierty->title ?></h3>
                <p><?php echo $propierty->description ?></p>
                <p class="price">$<?php echo $propierty->price ?></p>
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

                <a href="advert.php?id=<?php echo $propierty->id ?>" class="button-yellow-block">Show property</a>
            </div>
        </div>
    <?php } ?>
</div>