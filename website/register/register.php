<?php
include("constants.php");


$count;
$send;
$firstname;
$lastname;
$email;
$phone;
$date;
$password;
$country;
$username;



if(isset($_POST['register'])){
    
    $firstname  = strip_tags($_POST['firstname']);
    $lastname   = strip_tags($_POST['lastname']);
    $email      = strip_tags($_POST['email']);
    $phone      = strip_tags($_POST['phone']);
    $password   = strip_tags($_POST['password']);
    $country    = strip_tags($_POST['country']);
    $username   = strip_tags($_POST['username']);
    $month      = strip_tags($_POST['month']);
    $year       = strip_tags($_POST['year']);
    $day        = strip_tags($_POST['day']);
    $c_password = strip_tags($_POST['confirmpassword']);
    $userIP = $_SERVER['REMOTE_ADDR'];

    if($password == $c_password){
        $check_sql  = "SELECT id FROM `users` WHERE email = '$email' OR username = '$username'";
        $res_ck     = mysqli_query($conn , $check_sql);
        $count      = mysqli_num_rows($res_ck);
        $sec_id     = rand(100000 ,900000 );
        $send       = 1;
    }else{
        $send = 0;
        echo "<div class='err'> <p> password is wrong Please not paly in fucking javascript </p> </div>";
    }
    if($year > 2009){
        $send = 0;
    }
   if($count > 0){
   
    echo "<div class='err'> <p> Email is aready registed </p> </div>";


   }else{
    if($send == 1){
    $sql = "INSERT INTO users(sec_id , firstname , lastname , email  , password ,country , username, phone, active,month,year,day , ip) VALUES($sec_id , '$firstname' , '$lastname' , '$email' ,'$password' , '$country' , '$username' , '$phone' , 0, '$month' , '$year' ,'$day' , '$userIP')";
    $add = mysqli_query($conn , $sql);
    }else{
        echo"<center> <h1 style='font-size:80px;color:red;'> متلعبش في  الكود يا كس امك </h1> </center>";
    }
    if($add){
       
        echo "<div class='done'> <p> WE SEND FOR YOU A MESSAGE TO CHECK EMAIL  </p> </div> ";
      
        
    }else{
        echo "<div class='err'> <p> ERROR IN ADD </p> </div> ";
    }
    }
}



?>
