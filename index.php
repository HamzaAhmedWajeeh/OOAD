<?php
// index.php

require_once 'BusinessLogicLayer/Redirector.php';

// Redirect to welcome.php using the Redirector class
Redirector::redirect("PresentationLayer/login.php");
?>
