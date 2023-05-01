<?php session_start();?>

<?php
include("constants.php");
if($_SESSION['username']){
}else{
    echo " <center> <h1 style='color:red;'> ERROR 502 </h1> </center>";
    header('Location:'.URL.'/login');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome <?php echo $_SESSION['firstname']; ?></title>
</head>
<body>
 <h1>  Welcome <?php echo $_SESSION['firstname'];?> </h1>   
 <a href="http://oe.com/profile/logout.php"> log out</a>



 <form enctype="multipart/form-data" method="POST">
            Please choose a file: <input name="txt_file" type="file" id="txt_file" tabindex="1" size="35" onChange="txt_fileName.value=txt_file.value" />
            <input name="txt_fileName" type="hidden" id="txt_fileName" tabindex="99" size="1" />
            <input type="submit" name="SubmitFile" value="Upload File" accesskey="ENTER" tabindex="2" />
      </form>

<?php require "ftp/ftp.php";?>

<script src="js/app.js"></script>


</body>
</html>
