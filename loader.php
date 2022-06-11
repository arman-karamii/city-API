<?php

# cache constants
define('CACHE_ENABLED', 0);
define('CACHE_DIR', __DIR__ . '/cache');

#Auth_Consts

define('JWT_KEY', '14253647namra');
define('JWT_ALG', 'HS256');

include_once 'App/iran.php';
include_once 'vendor/autoload.php';

spl_autoload_register(function ($class) {

    $class_file = __DIR__ . "/" . $class . ".php";
    if (!(file_exists($class_file) and is_readable($class_file))) {
        die("$class not found");
    }

    include_once $class_file;

});

// use App\Utilities\Responce;

// Responce::respond((object) ["karaj", "kermanshah", "test"], 200);
