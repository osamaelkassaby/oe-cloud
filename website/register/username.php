<?php
include("constants.php");
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $sql = "SELECT id FROM `users` WHERE `username` = '$username'";
    
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count > 0){
        echo "Username is already Use .";
    }
}
if(isset($_GET['email'])){
    $email = $_GET['email'];
    $sql = "SELECT id FROM `users` WHERE `email` = '$email'";
        
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count > 0){
        echo "Email is already Use .";
    }
    
}