<?php
define("HOSTNAME" , "localhost");
define("USERNAME" ,  "root");
define("PASSWORD" , "");
define("DBNAME"   ,   "oe");
define("URL", "http://oe.com");
define("FTP_USERNAME" , "osama");
define("FTP_PASSWORD" , "osama@2244");
define("FTP_HOSTNAME" , "192.168.59.132");
$conn = mysqli_connect(HOSTNAME , USERNAME , PASSWORD,  DBNAME);




function report_server( $username , $sec_code ,$error_code,  $time , $note , $server_report_code ){
    $sql  = "INSERT INTO `errors`(`username` , `sec_code` , `error_code` ,`time` ,`note` , `report_server_code`) VALUES('$username' , $sec_code , $error_code , '$time' , '$note' , $server_report_code)";
    $send = mysqli_query($conn, $sql);
}

?>