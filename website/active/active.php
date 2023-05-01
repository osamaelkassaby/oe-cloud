<?php

include("constants.php"); 





if(isset($_POST['active'])){
    $sec_1  = $_POST['a1'];
    $sec_2  = $_POST['a2'];
    $sec_3  = $_POST['a3'];
    $sec_4  = $_POST['a4'];
    $sec_5  = $_POST['a5'];
    $sec_6  = $_POST['a6'];

    $sec_code  = strip_tags($sec_1. $sec_2 . $sec_3 . $sec_4 . $sec_5 . $sec_6);
    $username  = strip_tags($_GET['username']);
    $email     = strip_tags($_GET['email']);
    $timestamp = time();
    $time =  date("h:i:s", $timestamp);
    $sql_error ;
    $sql = "SELECT sec_id FROM `users` WHERE username = '$username' AND email = '$email'";
    $check = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($check);
    $report_server = rand(100000 , 9999999);
    $active_code = 0;
    if($count > 0){
        while($row = mysqli_fetch_assoc($check)){
            if($row['sec_id'] == $sec_code){
                $active_code = 1;
                $up_sql = "UPDATE users SET active = 1 WHERE username = '$username' AND email = '$email' AND sec_id =$sec_code";
                $up = mysqli_query($conn, $up_sql);
                if($up){
                $ftp_server    = FTP_HOSTNAME;  //address of ftp server.
                $ftp_user_name = FTP_USERNAME; // Username
                $ftp_user_pass = FTP_PASSWORD;   // Password
                $FTP_HOSTNAME  = FTP_HOSTNAME;
                $conn_id = ftp_connect($ftp_server);        // set up basic connection
                if(!$conn_id){
                    $sql_error = "INSERT INTO `errors`(`username`, `sec_code`, `error_code` , `time` , `note` , `report_server_code`) VALUES('$username' , $sec_code , 21 , '$time' , 'no connection in FTP SERVER $FTP_HOSTNAME' , $report_server)";
                    $send_error = mysqli_query($conn, $sql_error);
                    if($send_error) {
                        echo "Server connection has failed!  <br />";
                        $up_sql = "UPDATE users SET active = 0 WHERE username = '$username' AND email = '$email' AND sec_id =$sec_code";
                        $up = mysqli_query($conn, $up_sql);
                      
                        if($up){
                            echo " <div class='alert-err-report'> We Send Report To Support Team id : $report_server </div>  ";
                        }
                        exit;
                    }
                }
                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<h2>  </h2>");   // login with username and password, or give invalid user message
                if ((!$conn_id) || (!$login_result)) {  // check connection
             // wont ever hit this, b/c of the die call on ftp_login
                $sql_error = "INSERT INTO `errors`(`username`, `sec_code`, `error_code` , `time` , `note`) VALUES('$username' , $sec_code , 21 , '$time' , 'connection ftp Faild to $FTP_HOSTNAME')";
                $send_error = mysqli_query($conn, $sql_error);
                if($send_error) {
                    echo "Server connection has failed! <br />";
                    exit;
                }
              
                }else {
                $folder = ftp_mkdir($conn_id , "ftp/oe.cloud/".$username);
                if($folder){
                    
                    echo "<div class='alert-err'> <p> NOW EMAIL IS ACTIVE </p> </div>";
                }else{
                    $sql_error = "INSERT INTO `errors`(`username`, `sec_code`, `error_code` , `time` , `note` , `report_server_code`) VALUES('$username' , $sec_code , 21 , '$time' , ' Faild in Create Folder FTP SERVER $FTP_HOSTNAME' , $report_server)";
                    $send_error = mysqli_query($conn, $sql_error);
                    if($send_error){
                        echo "Error in Server";

                    }else{
                        echo "Error in Server";

                    }
                }

           
           
    }
                  
            }else{
                    echo "ERROR";
                }
            }
        }
    }else{
        echo "<div class='alert-err'> <p> Your email not found in database </p> </div>";
        $sql_error = "INSERT INTO `errors`(`username`, `sec_code`, `error_code` , `time` , `note` , `report_server_code`) VALUES('$username' , $sec_code , 21 , '$time' , 'Some One search in This Eamil $email And Username $username ' , $report_server)";
        $send_error = mysqli_query($conn, $sql_error);
    }

    if($active_code == 0){
        echo "<div class='alert-err'> <p> Active code is worng </p> </div>";
    }
   

}



?>
