<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title> reset password</title>
</head>
<body>
    <div class="text"> <p> Forget My Password . </p> </div>
    <div class="form">
        <div class="form-text"> <p> Enter Your Email or Username Here .. </p> </div>
    <form  method="post" enctype="multipart/form-data">
        <input type="email" name="email"  placeholder=" Email or Username"  required>
        <br />
        <div class="send-btn"> <button type="submit" name="reset"> Send </button></div>
    </form>
    </div>
   <?php  require "reset.php"?>
</body>
</html>