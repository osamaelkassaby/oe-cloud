<?php

#user info from mysql
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$country = $_SESSION['country'];

setcookie('user', $username, $firstname, $lastname)



?>