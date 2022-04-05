<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL',  __DIR__ . 'functions.php');
define('IMAGE_FOLDER', __DIR__ . '/../img/');


function addTemplate(string $name, bool $start = false)
{
    include TEMPLATES_URL . "/${name}.php";
}

function isAuth()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}
