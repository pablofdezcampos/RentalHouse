<?php
require 'includes/functions.php';
addTemplate('header');
?>

<main class="container section center-content">
    <h1>Our Blog</h1>

    <article class="entry-blog">
        <div class="image">
            <picture>
                <source srcset="build/img/blog1.webp" type="image/webp">
                <source srcset="build/img/blog1.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/blog1.jpg" alt="Entry Image Blog">
            </picture>
        </div>

        <div class="text-entry">
            <a href="entry.html">
                <a href="entry.php">
                    <h4>Terrace in your house</h4>
                    <p class="meta-information">Wrote: <span>24/01/2022</span>by: <span>Admin</span></p>
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
                <p class="meta-information">Wrote: <span>24/01/2022</span> by: <span>Admin</span></p>
            </a>
            <p>
                Maximize the space in your house with this guide. Learn how to change colors to give space´s live.
            </p>
        </div>

    </article>

    <article class="entry-blog">
        <div class="image">
            <picture>
                <source srcset="build/img/blog3.webp" type="image/webp">
                <source srcset="build/img/blog3.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/blog3.jpg" alt="Entry Image Blog">
            </picture>
        </div>

        <div class="text-entry">
            <a href="entry.php">
                <h4>Guide for the decoration in your house</h4>
                <p class="meta-information">Wrote: <span>24/01/2022</span>by: <span>Admin</span></p>
            </a>
            <p>
                Maximize the space in your house with this guide. Learn how to change colors to give space´s live.
            </p>
        </div>

    </article>
</main>


<?php addTemplate('footer') ?>