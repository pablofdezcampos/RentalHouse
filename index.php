<?php
require 'includes/functions.php';
addTemplate('header', $start = true);
?>

<main class="container section">
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
</main>

<section class="section container">
    <h2>Houses and Apartaments in Sale</h2>

    <?php
    $limit = 3;
    include 'includes/templates/adverts.php';
    ?>

    <div class="align-rigth container">
        <a href="adverts.php" class="button-green">Show all</a>
    </div>
</section>

<section class="image-contact">
    <h2>Find the house of your dreams</h2>
    <p>Please, fill the contact form and a asesor will contact you</p>

    <a href="contact.php" class="button-yellow-block">Contact Us</a>
</section>

<div class="container section lower-section">

    <section class="container blog">
        <h3>Our Blog</h3>
        <article class="entry-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Entry Image Blog">
                </picture>
            </div>

            <div class="text-entry">

                <a href="entry.php">
                    <h4>Terrace in your house</h4>
                    <p class="meta-information">Wrote: <span>24/01/2022</span> &nbsp by: <span>Admin</span></p>
                </a>
                <p>
                    Tips for build a terrace in your house with the bests materials.
                </p>
            </div>

        </article>

        <article class="entry-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Entry Image Blog">
                </picture>
            </div>

            <div class="text-entry">

                <a href="entry.php">
                    <h4>Guide for the decoration in your house</h4>
                    <p class="meta-information">Wrote: <span>24/01/2022</span> &nbsp by: <span>Admin</span></p>
                </a>
                <p>
                    Maximize the space in your house with this guide. Learn how to change colors to give space´s live.
                </p>
            </div>

        </article>

    </section>

    <section class="comments">
        <h3>Comments</h3>
        <div class="comment">
            <blockquote>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quod, officiis laborum cupiditate laudantium deleniti. Culpa praesentium voluptates, esse facere voluptate dolor aliquam, ut sit itaque fugit temporibus consequatur similique?
            </blockquote>
            <p>- Author</p>
        </div>
    </section>

</div>

<?php addTemplate('footer') ?>