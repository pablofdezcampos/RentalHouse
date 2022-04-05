<?php
require 'includes/app.php';
$db = connectDataBase();

//Generation of email and password
$email = 'user@email.com';
$password = '1234';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Query to create the user
$query = "INSERT INTO users(email, password) VALUES ('${email}', '${passwordHash}')";

//Add to database
mysqli_query($db, $query);
