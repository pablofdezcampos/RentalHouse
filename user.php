<?php
require 'includes/config/database.php';
$db = connectDataBase();

//Generation of email and password
$email = 'user';
$password = '1234';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Query to create the user
$query = "INSERT INTO users(email, password) VALUES ('${email}', '${passwordHash}')";

//Add to database
mysqli_query($db, $query);
