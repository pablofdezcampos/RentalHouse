<?php

require 'app.php';

function addTemplate(string $name, bool $start = false)
{
    include TEMPLATES_URL . "/${name}.php";
}
