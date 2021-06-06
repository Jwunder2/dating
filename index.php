<?php


//This is my controller

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session

//Require autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');

session_start();

$f3 = Base::instance();
$con = new Controller($f3);

//define default route
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

$f3->route('GET|POST /info1', function()
{
    $GLOBALS['con']->info1();
});

$f3->route('GET|POST /info2', function()
{
    $GLOBALS['con']->info2();
});

$f3->route('GET|POST /info3', function()
{
    $GLOBALS['con']->info3();
});

$f3->route('GET /summary', function(){
    $GLOBALS['con']->summary();
});


$f3->run();
