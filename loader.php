<?php

include_once 'App/iran.php';

spl_autoload_register(function ($class) {

    $class_file = __DIR__ . "/" . $class . ".php";
    if (!(file_exists($class_file) and is_readable($class_file))) {
        die("$class not found");
    }

    include_once $class_file;

});

// use App\Utilities\Responce;

// Responce::respond((object) ["karaj", "kermanshah", "test"], 200);
