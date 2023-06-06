<?php

class UserDAL {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    // Create a new user in the database
    public function createUser($username, $email, $password, $verificationCode,$serializedOptions) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_tb (User_Email,Area_of_Law, User_Password, verification_code,username) VALUES ('$email', '$serializedOptions', '$hashedPassword', '$verificationCode','$username')";
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
    
  public function updatePassword($email, $hashedPassword) {
    // Prepare the SQL statement with a placeholder for the email
    $checkSql = "SELECT User_Email FROM user_tb WHERE User_Email = '$email'";
    
    // Execute the check query
    $checkResult = $this->db->query($checkSql);
    
    // Check if the row exists
    if ($checkResult && $checkResult->num_rows > 0) {
        // Row exists, proceed with the update query
        $updateSql = "UPDATE user_tb SET User_Password = '$hashedPassword' WHERE User_Email = '$email'";

        // Execute the update query
        $updateResult = $this->db->query($updateSql);

        if ($updateResult) {
            // Password updated successfully
            
            return true;
        } else {
            // Password update failed
           
            return false;
        }
    } else {
        // Row does not exist, email not found
        
        return false;
    }
}

 //calender work

public function saveEvent($userId, $title, $date, $description) {
    $title = $this->db->real_escape_string($title);
    $date = $this->db->real_escape_string($date);
    $description = $this->db->real_escape_string($description);
    $sql = "INSERT INTO events_tb (user_id, title, date, description) VALUES ('$userId', '$title', '$date', '$description')";
    if ($this->db->query($sql) === TRUE) {
        return true; // Event saved successfully
    } else {
        return "Error saving event: " . $this->db->error; // Return error message
    }
}

public function getEventsByUserId($userId) {
    $userId = $this->db->real_escape_string($userId);
    $sql = "SELECT * FROM events_tb WHERE user_id = '$userId'";
    $result = $this->db->query($sql);
    $totalrow = mysqli_num_rows($result);

    if ($totalrow) {
        $events = $result->fetch_all(MYSQLI_ASSOC);
    

    return $events;
    }
}


}
?>
