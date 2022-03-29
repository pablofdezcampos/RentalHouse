<?php
require 'includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Contact</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/web">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Image of Contact">
    </picture>
    <h2>Please, fill the contact form</h2>
    <form class="form">

        <fieldset>
            <legend>Personal Information</legend>
            <label for="name">Name:</label>
            <input type="text" placeholder="Name" id="name">

            <label for="email">Email:</label>
            <input type="email" placeholder="Email" id="email">

            <label for="phone">Phone:</label>
            <input type="tel" placeholder="Phone" id="phone">

            <label for="messaje">Messaje:</label>
            <textarea id="messaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Information about the propierty</legend>
            <label for="options">Sell or Shop:</label>
            <select id="options">
                <option value="" disabled selected>--Select an option--</option>
                <option value="sell">Sell</option>
                <option value="shop">Shop</option>
            </select>

            <label for="">Price or Budget</label>
            <input type="number" placeholder="Your Price or Budget" id="budget">
        </fieldset>

        <fieldset>
            <legend>Contact</legend>
            <p>How you want to be contact:</p>
            <div class="form-contact">
                <label for="contact-phone">Phone</label>
                <input name="contact" type="radio" value="phone" id="contact-phone">

                <label for="contact-email">Email</label>
                <input name="contact" type="radio" value="email" id="contact-email">
            </div>

            <p>If you choose phone, please select the date and hour:</p>

            <label for="date">Date:</label>
            <input type="date" id="date">

            <label for="hour">Hour</label>
            <input type="time" id="hour" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" value="Send" class="button-green">

    </form>
</main>

<?php addTemplate('footer') ?>