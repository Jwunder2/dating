<?php
require_once ('classes/dating.php');
class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function info1()
    {
        $_SESSION = array();

        $userGender = "";
        //If form submitted, add data to session
        //and send user to orderForm2
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userFName = $_POST['fname'];

            $userLName = $_POST['lname'];

            $userAge = $_POST['age'];

            $userNumber = $_POST['phoneNumber'];

            $userGender = $_POST['gender'];


            $userMember ="member";
            $_SESSION[$userMember] = $_POST['member'];


            $_SESSION['dating'] = new Member();


            if(validFName($_POST['fname'])) {
                $_SESSION['dating']->setFname($userFName);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["fname"]', 'Please enter a Name with only alphabetic characters');
            }

            if(validLName($_POST['lname'])) {
                $_SESSION['dating']->setLname($userLName);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a Name with only alphabetic characters');
            }

            if(validAge($_POST['age'])) {
                $_SESSION['dating']->setAge($userAge) ;
            }
            //Otherwise, set an error variable in the hive
            else {
               $this->_f3->set('errors["age"]', 'Please enter an age between 18 and 118');
            }

            if(validPhone($_POST['phoneNumber'])) {
                $_SESSION['dating']->setPhone($userNumber);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["phoneNumber"]', 'Please enter ten digits for your number');
            }

            $_SESSION['dating']->setGender($userGender);


            if (empty($this->_f3->get('errors'))) {
                header('location: info2');
            }

        }

        $this->_f3->set('userFName', $userFName);
        $this->_f3->set('userLName', $userLName);
        $this->_f3->set('userAge', $userAge);
        $this->_f3->set('userNumber', $userNumber);
        $this->_f3->set('userMember', $userMember);

        $view = new Template();
        echo $view->render('views/info1.html');
    }

    function info2()
    {

        //If form submitted, add datat to session
        //and send user to orderForm2
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $userMail = $_POST['email'];
            $userSeeking = $_POST['seeking'];
            $userBio = $_POST['bio'];
            $userState = $_POST['state'];

            if(validEmail($_POST['email'])) {
                $_SESSION['dating']->setEmail($userMail);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["email"]', 'Please enter a valid Email');
            }

            $_SESSION['dating']->setSeeking($userSeeking);
            $_SESSION['dating']->setBio($userBio);
            $_SESSION['dating']->setState($userState);

            if (empty($this->_f3->get('errors'))) {
                header('location: info3');
            }
        }

        $this->_f3->set('userMail', $userMail);



        $view = new Template();
        echo $view->render('views/info2.html');
    }


    function info3()
    {
         if($_SESSION["member"] == "Yes")
         {
             $userChoices = array();
             $_SESSION['datingPrem'] = new PremiumMember();

             //If form submitted, add data to session
             //and send user to orderForm2
             if($_SERVER['REQUEST_METHOD'] == 'POST') {

                 if (!empty($_POST['Indoors'])) {

                     //Get user input
                     $userChoices = $_POST['Indoors'];

                     //If choices are valid
                     if (validIndoor($userChoices)) {
                         $_SESSION['datingPrem']->setIndoorInterests(implode(", ", $userChoices));
                     } else {
                         $this->_f3->set('errors["Indoors"]', 'Invalid selection');
                     }
                 }

                 if (!empty($_POST['Outdoors'])) {
                     //Get user input
                     $userChoices = $_POST['Outdoors'];

                     //If choices are valid
                     if (validOutdoor($userChoices)) {
                         $_SESSION['datingPrem']->setOutDoorInterests(implode(", ", $userChoices));
                     } else {
                         $this->_f3->set('errors["Outdoors"]', 'Invalid selection');
                     }
                 }
                 if (empty($this->_f3->get('errors'))) {
                     header('location: summary');
                 }
             }

             $this->_f3->set('Indoor', getIndoor());
             $this->_f3->set('Outdoor', getOutdoor());
             $this->_f3->set('userChoices', $userChoices);

             $view = new Template();
             echo $view->render('views/info3.html');
         } else {
             header('location: summary');
         }

    }

    function summary()
    {

        //Display the summary
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}