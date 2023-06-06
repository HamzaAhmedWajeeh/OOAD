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
        $selectedOptions=$user->getSelectedOptions();
        // Check if username or email already exists
        if ($this->userDAL->getUserByUsername($username)) {
            return 'Username already exists';
        }

        if ($this->userDAL->getUserByEmail($email)) {
            return 'Email already exists';
        }

        // Create the user in the database
        if ($this->userDAL->createUser($username, $email, $password, $verificationCode,$serializedOptions)) {
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
    $message .= '<a href="http://cms.lawseer.co/PresentationLayer/userverified.php?username=' . $username . '&code=' . $verificationCode . '">Verify Email</a>';

    $h = "syedadnanalibhatti@gmail.com";
    

    mail($email, $subject, $message, $h);
   
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
    public function loginUser($email, $password, $rememberMe) {
        $user = $this->userDAL->getUserByEmailAndPassword($email, $password);
    
        if ($user) {
            // Start the user session or perform any necessary authentication
            session_start();
    
            // Store relevant user information in session
            $_SESSION['username'] = $user['username'];
           $_SESSION['userId'] = $user['User_id'];
           
            
             // Check if the "Remember Me" checkbox is selected
        if ($rememberMe) {
            // Set the remember me cookie for 1 hour
            setcookie('emailid', $email, time() + 3600);
            setcookie('password', $password, time() + 3600);
        } else {
            // Remove the remember me cookie
            setcookie('emailid', '', time() - 3600);
            setcookie('password', '', time() - 3600);
        }
    
            // Redirect to welcome.php
            header('Location: http://cms.lawseer.co/PresentationLayer/layout.php');
            exit();
        } else {
        // Email not found, display error message
        return 'Email or password incorrect or  Have you verified your account?';
    }
    }
        
    
    
   function sendPasswordResetEmail($email) {
    // Set the email subject
    $subject = 'Password Reset';

    // Set the email body
    $message = 'Reset Your Password by clicking below link.';
    $message .= '<a href="http://cms.lawseer.co/PresentationLayer/recoverPassword.php?email=' . $email .'">Reset Password</a>';
    // Set the email headers
    $headers = 'From: Adnan Ali <syedadnanalibhatti@gmail.com>' . "\r\n";
    $headers .= 'Reply-To: noreply@cms.com' . "\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";

    if ($this->userDAL->getUserByEmail($email)) {
        // Send the email
        if (mail($email, $subject, $message, "syedadnanalibhatti@gmail.com")) {
            // Email sent successfully
            $errorMessage = "Password Reset Email has been sent";
        } else {
            // Failed to send email
            $errorMessage = "Failed to send email";
        }
    } else {
        // Email does not exist
        $errorMessage = "Email does not exist";
    }

    return $errorMessage;
}



public function updatePassword($email, $password) {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Call the updatePassword method in the UserDAL class to update the //password
    $updateResult = $this->userDAL->updatePassword($email, $hashedPassword);

    return $updateResult;
}


//calender 

 public function saveEvent($userId, $title, $date, $description) {
      return $this->userDAL->saveEvent($userId, $title, $date, $description);
    
}

    public function getEventsByUserId($userId) {
        // Call the getEventsByUserId method in the UserDAL class to retrieve events
        return $this->userDAL->getEventsByUserId($userId);
    }
    }
    
    
    

?>
