<?php

$server = "";
$username = "root";
$password = "";
$dbname = "kidstown";
if(isset($_POST['send'])){
    $name   = strip_tags($_POST['name']);
    $phone  = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    $message = strip_tags($_POST['message']);
    $conn = mysqli_connect($server , $username , $password , $dbname);

    if($conn){
        $sql = "INSERT INTO `contact`(`name` , `phone`, `email`, `message`) VALUES ('$name' , '$phone' , '$email' , '$message')";
        $result = mysqli_query($conn , $sql);
        if($result){
            echo " اكتب هنا يا احمد ";
        }else{
            echo "Error";
        }
    }else{
        echo "Error In Database";
    }

}
?>