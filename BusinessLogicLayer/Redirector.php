<?php
// Redirector.php.

class Redirector {
    public static function redirect($location) {
        // Redirect to  specified location
        header("Location: $location");
        exit();
    }
}
?>
