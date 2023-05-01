<?php

include("constants.php");


if(isset($_POST['reset'])){
    $email = strip_tags($_POST['email']);

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $check = mysqli_query($conn , $sql);
    $count = mysqli_num_rows($check);
    if($count > 0){
        $sec_id = rand(100000 ,999999);
        $rand   = rand(20 ,45);
        $token  =  bin2hex(random_bytes($rand));
        $id;
        while($row = mysqli_fetch_assoc($check)){
            $id = $row['id'];
        }
        $sql_s = "UPDATE users SET sec_id = $sec_id WHERE email = '$email' AND id = $id";
        $sql_token = "UPDATE users SET token = '$token' WHERE email = '$email' AND id =$id";
        $res_token = mysqli_query($conn , $sql_token);
        $result = mysqli_query($conn , $sql_s);
        if($result && $res_token){
            // send mail notification
            echo "<div class='alert-done'> <p> We send for You A Message .  <p> </div>";
   
        }else{
            echo "Erorr";
        }
    }else{
        echo "<div class='alert-err'> <p> We send for You A Message to Email $email </p> </div>";
    }
}

