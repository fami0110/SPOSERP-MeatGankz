<?php
require_once 'config/config.example.php';
require_once '../vendor/autoload.php';

spl_autoload_register(function ($class) {
    require_once "../core/$class.php";
});
