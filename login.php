<?php
require 'includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Log In</h1>

    <form class="form login">
        <fieldset>
            <legend>Email and Password</legend>
            <label for="email">Email:</label>
            <input type="email" placeholder="Email" id="email">

            <label for="password">Password:</label>
            <input type="password" placeholder="Password" id="password">

            <label for="phone">Phone:</label>
            <input type="tel" placeholder="Phone" id="phone">
        </fieldset>
    </form>
</main>

<?php
addTemplate('footer');
?>