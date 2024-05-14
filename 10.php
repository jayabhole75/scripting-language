<?php
// Check if the cookie named "visited" exists
if (isset($_COOKIE['visited'])) {
    $message = "Welcome back!";
} else {
    $message = "Welcome!";
}

// Display the message
echo $message;
?>