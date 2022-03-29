<?php

function connectDataBase(): mysqli
{
    $db = mysqli_connect('localhost', 'root', 'Ypk17820=', 'rentalhouse_crud');

    if (!$db) {
        echo 'Error in the connection';
        exit;
    }

    return $db;
}
