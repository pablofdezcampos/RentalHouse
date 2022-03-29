<?php
require 'includes/functions.php';
addTemplate('header');
?>
<main class="container section">
    <h1>Know more About US</h1>

    <div class="content-us">
        <div class="image">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazu" src="build/img/nosotros.jpg" alt="About US">
            </picture>
        </div>

        <div class="text-us">
            <blockquote>
                25 years of experience
            </blockquote>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat neque, tempora minus quia magnam impedit nobis necessitatibus mollitia repellendus hic? Culpa consequatur, assumenda repellat iure atque tempora consequuntur ab distinctio?. Lorem, ipsum
                dolor sit amet consectetur adipisicing elit. Expedita, ipsam reiciendis veritatis officiis ducimus aspernatur voluptate dignissimos ratione dolores obcaecati magni. Autem illum fugit harum provident, animi atque saepe non. Lorem ipsum
                dolor sit, amet consectetur adipisicing elit. Quas ipsam eum praesentium possimus reiciendis debitis distinctio molestiae dicta animi nemo incidunt rem, cum tempore voluptates sequi libero, obcaecati cupiditate quis?. Lorem ipsum dolor
                sit amet consectetur adipisicing elit. Neque magni sint ipsam ab veniam dolor minima perspiciatis est. Deserunt qui culpa dolorum corrupti incidunt eius dolorem id ad reprehenderit quam?
            </p>

            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas ipsam eum praesentium possimus reiciendis debitis distinctio molestiae dicta animi nemo incidunt rem, cum tempore voluptates sequi libero, obcaecati cupiditate quis?. Lorem ipsum dolor sit
                amet consectetur adipisicing elit. Neque magni sint ipsam ab veniam dolor minima perspiciatis est. Deserunt qui culpa dolorum corrupti incidunt eius dolorem id ad reprehenderit quam?
            </p>
        </div>

    </div>
</main>

<section class="container section">
    <h1>More About Us</h1>
    <div class="icons-us">

        <div class="icon">
            <img src="build/img/icono1.svg" alt="Security Icon" loading="lazy">
            <h3>Security</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis perspiciatis dolores tenetur facilis. Ipsam, perspiciatis sit. Laboriosam doloribus incidunt voluptatum natus debitis in velit consectetur officia, ipsa repellat. At, illo.
            </p>

        </div>

        <div class="icon">
            <img src="build/img/icono2.svg" alt="Price Icon" loading="lazy">
            <h3>Price</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis perspiciatis dolores tenetur facilis. Ipsam, perspiciatis sit. Laboriosam doloribus incidunt voluptatum natus debitis in velit consectetur officia, ipsa repellat. At, illo.
            </p>

        </div>

        <div class="icon">
            <img src="build/img/icono3.svg" alt="Time Icon" loading="lazy">
            <h3>Time</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis perspiciatis dolores tenetur facilis. Ipsam, perspiciatis sit. Laboriosam doloribus incidunt voluptatum natus debitis in velit consectetur officia, ipsa repellat. At, illo.
            </p>
        </div>

    </div>
</section>

<?php addTemplate('footer') ?>