<?php
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo "The value of the 'username' cookie is: " . $username;
} else {
    echo "Cookie named 'username' is not set.";
}
