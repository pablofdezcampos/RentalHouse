<?php

function connectDataBase(): mysqli
{
    $db = mysqli_connect('localhost', 'root', 'root', 'rentalhouse_crud');

    if (!$db) {
        echo 'Error in the connection';
        exit;
    }

    return $db;
}
