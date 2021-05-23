<?php


//This is my controller

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');

$f3 = Base::instance();

//define default route
$f3->route('GET /', function() {
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /info1', function($f3)
{
    $_SESSION = array();

    //If form submitted, add data to session
    //and send user to orderForm2
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $userFName = $_POST['fname'];

        $userLName = $_POST['lname'];

        $userAge = $_POST['age'];

        $userNumber = $_POST['phoneNumber'];

        if(validFName($_POST['fname'])) {
            $_SESSION['fname'] = $userFName;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["fname"]', 'Please enter a Name with only alphabetic characters');
        }

        if(validLName($_POST['lname'])) {
            $_SESSION['lname'] = $userLName;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["lname"]', 'Please enter a Name with only alphabetic characters');
        }

        if(validAge($_POST['age'])) {
            $_SESSION['age'] = $userAge;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["age"]', 'Please enter an age between 18 and 118');
        }

        if(validPhone($_POST['phoneNumber'])) {
            $_SESSION['phoneNumber'] = $userNumber;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["phoneNumber"]', 'Please enter ten digits for your number');
        }

        $_SESSION['gender'] = $_POST['gender'];


        if (empty($f3->get('errors'))) {
            header('location: info2');
        }

    }

    $f3->set('userFName', $userFName);
    $f3->set('userLName', $userLName);
    $f3->set('userAge', $userAge);
    $f3->set('userNumber', $userNumber);

    $view = new Template();
    echo $view->render('views/info1.html');
});

$f3->route('GET|POST /info2', function($f3)
{


    //If form submitted, add datat to session
    //and send user to orderForm2
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $userMail = $_POST['email'];
        if(validEmail($_POST['email'])) {
            $_SESSION['email'] = $userMail;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["email"]', 'Please enter a valid Email');
        }

        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['state'] = $_POST['state'];

        if (empty($f3->get('errors'))) {
            header('location: info3');
        }
    }

    $f3->set('userMail', $userMail);

    $view = new Template();
    echo $view->render('views/info2.html');
});

$f3->route('GET|POST /info3', function($f3)
{


    $userChoices = array();

    //If form submitted, add data to session
    //and send user to orderForm2
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!empty($_POST['Indoors'])) {

            //Get user input
            $userChoices = $_POST['Indoors'];

            //If choices are valid
            if (validIndoor($userChoices)) {
                $_SESSION['Indoors'] = implode(", ", $userChoices);
            } else {
                $f3->set('errors["Indoors"]', 'Invalid selection');
            }
        }

        if (!empty($_POST['Outdoors'])) {
            //Get user input
            $userChoices = $_POST['Outdoors'];

            //If choices are valid
            if (validOutdoor($userChoices)) {
                $_SESSION['Outdoors'] = implode(", ", $userChoices);
            } else {
                $f3->set('errors["Outdoors"]', 'Invalid selection');
            }
        }
        if (empty($f3->get('errors'))) {
            header('location: summary');
        }
    }

    $f3->set('Indoor', getIndoor());
    $f3->set('Outdoor', getOutdoor());
    $f3->set('userChoices', $userChoices);

    $view = new Template();
    echo $view->render('views/info3.html');
});

$f3->route('GET /summary', function(){

    //Display the summary
    $view = new Template();
    echo $view->render('views/summary.html');
});


$f3->run();
