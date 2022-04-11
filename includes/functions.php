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

//Scape / Sanitization HTML
function sanitization($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

//Validate content 
function validateTypeContent($type)
{
    $types = ['seller', 'propierty'];

    return in_array($type, $types);
}

function showNotification($code)
{
    $messaje = '';

    switch ($code) {
        case 1:
            $messaje = 'Correctly Creation';
            break;
        case 2:
            $messaje = 'Correctly Update';
            break;
        case 3:
            $messaje = 'Correctly Elimination';
            break;
        default:
            $messaje = false;
            break;

            return $messaje;
    }
}
