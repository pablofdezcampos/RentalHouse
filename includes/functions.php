<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL',  __DIR__ . 'functions.php');


function addTemplate(string $name, bool $start = false)
{
    include TEMPLATES_URL . "/${name}.php";
}

function isAuth(): bool
{
    session_start();

    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}
