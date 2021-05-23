<?php
function validFName($fname)
{
    $nameCheck = $fname;
   if (ctype_alpha($nameCheck) == false)
   {
       return false;
   }
   return $nameCheck;
}

function validLName($lname)
{
    $nameCheck = $lname;
    if (ctype_alpha($nameCheck) == false)
    {
        return false;
    }
    return true;
}

function validAge($age)
{
    if( !( $age > 18 && $age<118 ) )
    {
        return false;
    }
    return true;
}

function validPhone($phoneNumber)
{
    $numberLength = strlen($phoneNumber);

    if ($numberLength != 10)
    {
        return false;
    }
    return true;

}

function validEmail($email)
{
    $inputEmail =  $email;

    if (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function validIndoor($Indoors)
{
    $validChoices = getIndoor();

    //Make sure each selected condiment is valid
    foreach ($Indoors as $userChoices) {
        if (!in_array($userChoices, $validChoices)) {
            return false;
        }
    }

    //All choices are valid
    return true;
}

function validOutdoor($Outdoors)
{
    $validChoices = getOutdoor();

    //Make sure each selected condiment is valid
    foreach ($Outdoors as $userChoices) {
        if (!in_array($userChoices, $validChoices)) {
            return false;
        }
    }

    //All choices are valid
    return true;
}