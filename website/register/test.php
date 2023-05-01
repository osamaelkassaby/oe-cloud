<?php
    require "mail.php";
    $mail->addAddress("osamaelkassaby11@gmail.com");
    $mail->Subject = "eamil and password ";
    $mail->Body    = 'test';
    $mail->SetFrom("osamaelkassaby.server@outlook.com","osamaelkassaby");
   if($mail->send()){
    echo "send";   
}
?>