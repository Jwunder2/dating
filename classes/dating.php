<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    public function __construct($fname = "", $lname = "", $age = "", $gender = "", $phone = "", $email = "", $state = "", $seeking = "", $bio = "")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
        $this->_email = $email;
        $this->_state = $state;
        $this->_seeking = $seeking;
        $this->_bio = $bio;
    }

    /**
     * @return mixed|string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @return mixed|string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @return mixed|string
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @return mixed|string
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @return mixed|string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @return mixed|string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return mixed|string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @return mixed|string
     */

    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @return mixed|string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @param string $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @param  string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @param string $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}


class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    public function __construct($inDoorInterests = "", $outDoorInterests = "")
    {
        parent::__construct($this->getFname(),$this->getLname(),$this->getAge(),$this->getGender(),$this->getPhone(),
            $this->getEmail(),$this->getState(),$this->getSeeking(),$this->getBio());
        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;
    }


    /**
     * @return mixed|string
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @return mixed|string
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed|string $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @param mixed|string $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

}



