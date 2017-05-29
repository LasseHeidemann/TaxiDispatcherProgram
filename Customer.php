<?php

/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 5/29/2017
 * Time: 9:34 PM
 */
class Customer
{
    private $firstName, $lastName, $email, $phoneNo, $password;

    /**
     * Customer constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $phoneNo
     * @param $password
     */

    public function __construct($firstName, $lastName, $email, $phoneNo, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNo = $phoneNo;
        $this->password = $password;
    }
}