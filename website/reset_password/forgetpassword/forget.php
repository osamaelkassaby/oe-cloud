<?php
include("constants.php");

if(isset($_POST['send'])){
    $email     = strip_tags($_GET['email']);
    $user_id   = strip_tags($_GET['userid']);
    $sec_code  = strip_tags($_GET['seccode']);
    $token     = strip_tags($_GET['token']);
    $fname     = strip_tags($_POST['fname']);
    $lname     = strip_tags($_POST['lname']);
    
    echo $token . "<br />";
    echo $user_id . "<br />";
    echo $sec_code . "<br />";
    echo $email  . "<br />";
    $firstname ;
    $lastname ;


    $sql_check = "SELECT firstname , lastname FROM users WHERE email = '$email' AND user_id = $user_id AND sec_code = $sec_code AND token = '$token'";
    $check = mysqli_query($conn, $sql_check);
    $res   = mysqli_num_rows($check);
    
    if($res > 0){
        while($row = mysqli_fetch_assoc($check)){
            $firstname =  $row['firstname'];
            $lastname  =  $row['lastname'];
        }
        if($firstname == $fname && $lastname == $lname){
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email']  = $email;
            $_SESSION['sec_code'] = $sec_code;
            $_SESSION['firstname']    = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['token']  = $token;
            header("Location:".URL."/reset_password/forgetpassword/newpass");
        }else{
            echo "Firstname and Lastname is wrong";
        }
    }else{
        echo "Error";
    }
}