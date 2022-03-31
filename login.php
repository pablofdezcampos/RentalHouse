<?php
require 'includes/config/database.php';
$db = connectDataBase();

$errors = [];

$email = '';
$password = '';

//User Athentication
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $erros[] = "The email is required or is not valid";
    }

    if (!$password) {
        $errors[] = "The password is required";
    }

    if (empty($errors)) {
        //Check if the user exists
        $query = "SELECT * FROM users WHERE email = '{$email}'";
        $result = mysqli_query($db, $query);

        if ($result->num_rows) {
            //Check the email in the database
            $user = mysqli_fetch_assoc($result);

            //Check the password    
            $auth = password_verify($password, $user['password']);

            if ($auth) {
                //Save login user
                session_start();

                $_SESSION['user'] = $user['email'];
                $_SESSION['login'] = true;
            } else {
                $errors[] = 'The password is not correct';
            }
        } else {
            $errors[] = 'The email don´t exists';
        }
    }
}

require 'includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Log In</h1>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form login" method="POST">
        <fieldset>
            <legend>Email and Password</legend>
            <label for="email">Email:</label>
            <input type="email" placeholder="Email" name="email" id="email">

            <label for="password">Password:</label>
            <input type="password" placeholder="Password" name="password" id="password">

        </fieldset>
        <input type="submit" value="Log In" class="button button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>