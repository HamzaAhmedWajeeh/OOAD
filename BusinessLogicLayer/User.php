<?php

class User {
    private $username;
    private $email;
    private $password;
    private $verificationCode;
    private $selectedOptions;

    public function __construct($username, $email, $password, $selectedOptions) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->verificationCode = $this->generateVerificationCode();
        $this->selectedOptions = $selectedOptions;
    }

    // Generate a random verification code
   private function generateVerificationCode() {
    $randomNumber = rand(10000, 99999);
    return $randomNumber;
}
public function getSelectedOptions() {
    return $this->selectedOptions;
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
