<?php

function connectDataBase(): mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'rentalhouse_crud');

    if (!$db) {
        echo 'Error in the connection';
        exit;
    }

    return $db;
}
