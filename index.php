<?php


//This is my controller

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

$f3 = Base::instance();

//define default route
$f3->route('GET /', function () {
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->run();