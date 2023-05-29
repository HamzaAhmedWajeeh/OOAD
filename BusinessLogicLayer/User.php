<?php

class User {
    private $username;
    private $email;
    private $password;
    private $verificationCode;

    public function __construct($username, $email, $password, $selectedOptions) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->verificationCode = $this->generateVerificationCode();
    }

    // Generate a random verification code
    private function generateVerificationCode() {
        $randomNumber = rand(10000, 99999);
        return $this->$randomNumber;
    }

    // Get the username
    public function getUsername() {
        return $this->username;
    }

    // Get the email
    public function getEmail() {
        return $this->email;
    }

    // Get the password
    public function getPassword() {
        return $this->password;
    }

    // Get the verification code
    public function getVerificationCode() {
        return $this->verificationCode;
    }
}
?>
