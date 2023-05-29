<?php

class UserBLL {
    private $userDAL;

    public function __construct(UserDAL $userDAL) {
        $this->userDAL = $userDAL;
    }

    // Register a new user
    public function registerUser(User $user) {
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $verificationCode = $user->getVerificationCode();

        // Check if username or email already exists
        if ($this->userDAL->getUserByUsername($username)) {
            return 'Username already exists';
        }

        if ($this->userDAL->getUserByEmail($email)) {
            return 'Email already exists';
        }

        // Create the user in the database
        if ($this->userDAL->createUser($username, $email, $password, $verificationCode,$selectedOptions)) {
            // Send email verification
            $this->sendVerificationEmail($username, $email, $verificationCode);

            return 'Registration successful. Please check your email for verification.';
        } else {
            return 'Registration failed';
        }
    }

    // Send verification email
    private function sendVerificationEmail($username, $email, $verificationCode) {
        $to = $email;
    $subject = 'Email Verification';
    $message = 'Dear ' . $username . ',<br><br>';
    $message .= 'Thank you for registering. To complete your registration, please click on the following link: <br><br>';
    $message .= '<a href="https://creatwebsmashers.000webhostapp.com/PresentationLayer/userverified.php?username=' . $username . '&code=' . $verificationCode . '">Verify Email</a>';

    $headers = "From: Adnan Ali <syedadnanalibhatti@gmail.com>\r\n";
    $headers .= "Reply-To: Adnan Ali <syedadnanalibhatti@gmail.com>\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

        mail($email, $subject, $message, $headers);
    }

    // Verify user by username and verification code
    public function verifyUser($username, $verificationCode) {
        if (!empty($username) && !empty($verificationCode)) {
            $verificationResult = $this->userDAL->verifyUser($username, $verificationCode);
            if ($verificationResult === 'success') {
                // Redirect to login.php if verification is successful
                header('Location: login.php');
                exit();
            } else {
                // Verification failed, display alert and stay on the verification page
                echo '<script>alert("Email verification failed. Please check your verification code.");</script>';
            }
        } else {
            // Verification failed, display alert and stay on the verification page
            echo '<script>alert("Email verification failed. Please check your verification code.");</script>';
        }
    }
    public function loginUser($email, $password) {
        $user = $this->userDAL->getUserByEmailAndPassword($email, $password);
    
        if ($user) {
            // Start the user session or perform any necessary authentication
            session_start();
    
            // Store relevant user information in session
            $_SESSION['username'] = $user['username'];
    
            // Redirect to welcome.php
            header('Location: welcome.php');
            exit();
        } else {
            return 'Invalid email or password';
        }
    }
        
    

    
    }
    
    
    

?>
