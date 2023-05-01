<?php
session_start();
session_unset();

// destroy the session
session_destroy();
echo "<center> <h1 style='color:red'> LOGOUT </h1> </center>"; 
?>