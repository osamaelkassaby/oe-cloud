<?php
include("constants.php");
if(isset($_POST['send'])){
    $sec_1  = $_POST['a1'];
    $sec_2  = $_POST['a2'];
    $sec_3  = $_POST['a3'];
    $sec_4  = $_POST['a4'];
    $sec_5  = $_POST['a5'];
    $sec_6  = $_POST['a6'];

    $sec_code  = strip_tags($sec_1. $sec_2 . $sec_3 . $sec_4 . $sec_5 . $sec_6);

    $userid = $_SESSION['user_id'];
    $email =  $_SESSION['email'] ;
    $sec =   $_SESSION['sec_code'] ;
    $token    = $_SESSION['token'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $sec_id      = rand(100000 ,999999);
    $date        = date("Y/m/d");
    if($password == $conpassword){

        if($sec = $sec_code){
            $sql  = "UPDATE users SET password = '$password' WHERE email = '$email' AND token = '$token'";
            $send = mysqli_query($conn, $sql);
        }

        if($send){

          $sql_sec_id = "UPDATE users SET sec_id = '$sec_id' WHERE email = '$email' AND token = '$token'";
          $g_token  =  bin2hex(random_bytes(rand(20 , 45)));
          $sql_token  = "UPDATE users SET token = '$g_token' WHERE email = '$email' AND sec_code = '$sec_id'";

          $send_s_i   = mysqli_query($conn, $sql_sec_id);
          $send_token = mysqli_query($conn, $sql_token);

          if($send_token && $send_s_i){
            $report_password = "INSERT INTO report_passwords(email , user_id , sec_code , new_password , date) VALUES('$email' , $userid , $sec , '$password' , '$date') ";
            $send_report = mysqli_query($conn, $report_password);
            if($send_report){
                echo "<div class='alert'> <p> Password changed successfully <p> </div></p>";
                header("Location:".URL."/login");
                session_unset();
            }
        }
        }else{
            echo "<div class='alert-err'> <p> Faild <p> </div></p>";
        }
    }else{
        echo "<div class='alert-err'> <p> plesse check password  <p> </div></p>";
    }
}


?>