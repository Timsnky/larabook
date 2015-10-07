<?php namespace Larabook\Registration;


class RegisterUserCommand
{
    public $username;
    public $email;
    public $password;

    /**
     * RegisterUserCommand constructor.
     * @param $username
     * @param $email
     * @param $password
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


}