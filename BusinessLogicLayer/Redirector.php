<?php
// Redirector.php

class Redirector {
    public static function redirect($location) {
        // Redirect to the specified location
        header("Location: $location");
        exit();
    }
}
?>
