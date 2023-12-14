<?php
require_once '../vendor/autoload.php';
require_once 'config/config.php';

// Error Reporting
if (ENV == 'Production') {
    error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
};

spl_autoload_register(function ($class) {
    require_once "../core/$class.php";
});