<?php

class UserDAL {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    // Create a new user in the database
    public function createUser($username, $email, $password, $verificationCode,$selectedOptions) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_tb (User_Email,Area_of_Law, User_Password, verification_code,username) VALUES ('$email', '$selectedOptions', '$hashedPassword', '$verificationCode','$username')";
        return $this->db->query($sql);
    }

    // Get user by username
    public function getUserByUsername($username) {
        $sql = "SELECT * FROM user_tb WHERE username = '$username'";
        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }

    // Get user by email
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM user_tb WHERE 	User_Email = '$email'";
        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }

    // Verify user by username and verification code
    public function verifyUser($username, $verificationCode) {
        $sql = "SELECT verification_code FROM user_tb WHERE username = '$username'";
        $result = $this->db->query($sql);
        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($row['verification_code'] === $verificationCode) {
                $updateSql = "UPDATE user_tb SET verification_code = 'Verified' WHERE username = '$username'";
                $updateResult = $this->db->query($updateSql);
                if ($updateResult) {
                    return 'success';
                }
            }
        }
        return 'failure';
    }

    public function getUserByEmailAndPassword($email, $password) {
        $email = $this->db->real_escape_string($email);
    
        $sql = "SELECT * FROM user_tb WHERE User_Email = '$email' AND verification_code = 'Verified'";
        $result = $this->db->query($sql);
    
        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $hashedPassword = $user['User_Password'];
    
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                return $user;
                
            }
        }
    
        return null;
    }
    
    
    
    
}
?>
