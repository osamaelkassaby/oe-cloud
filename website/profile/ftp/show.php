<?php

session_start();
$username = $_SESSION['username'];

include("constants.php");

$ftp_server = FTP_HOSTNAME;  //address of ftp server.
$ftp_user_name = FTP_USERNAME; // Username
$ftp_user_pass = FTP_PASSWORD; //   // Password
$conn_id = ftp_connect($ftp_server);        // set up basic connection
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<h2>You do not have access to this ftp server!</h2>");   // login with username and password, or give invalid user message
if ((!$conn_id) || (!$login_result)) {  // check connection
       // wont ever hit this, b/c of the die call on ftp_login
       echo "FTP connection has failed! <br />";
       echo "Attempted to connect to $ftp_server for user $ftp_user_name";
       exit;
   } else {
      echo "Connected to $ftp_server, for user $ftp_user_name <br />";
      $contents = ftp_nlist($conn_id, "ftp/oe.cloud/".$username);

      // output $contents
      $file;
      foreach ($contents as $files){
        $file = $files;
      }

      echo $file;
      if (ftp_rename($conn_id, $file, "ftp/oe.cloud/osama/img.png", FTP_ASCII, 0)) {
        echo "successfully written to $file\n";
       } else {
        echo "There was a problem while downloading ";
       }
    
}

?>