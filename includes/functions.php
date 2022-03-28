<?php

require 'app.php';

function addTemplate($name, $start = false)
{
    include TEMPLATES_URL . "/${name}.php";
}
