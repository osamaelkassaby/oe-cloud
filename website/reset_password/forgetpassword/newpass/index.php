<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>new password</title>
</head>
<body>
    <?php session_start();     ?>
<div class="div-text"> <p> Please Enter code M.R <?php echo $_SESSION['lastname']; ?> </p>  </div>

<div class="form">
<form method="POST">
    <input type="text" id="a1" name="a1" maxlength="1" class='inp-key'  onkeyup="jump(this , 'a2')" required>
    <input type="text" id="a2" name="a2" maxlength="1"class='inp-key'   onkeyup="jump(this , 'a3')" required>
    <input type="text" id="a3" name="a3" maxlength="1" class='inp-key'  onkeyup="jump(this , 'a4')" required>
    <input type="text" id="a4" name="a4" maxlength="1" class='inp-key'  onkeyup="jump(this , 'a5')" required>
    <input type="text" id="a5" name="a5" maxlength="1" class='inp-key'  onkeyup="jump(this , 'a6')" required>
    <input type="text" id="a6" name="a6" maxlength="1" class='inp-key'   required>
    <br />
    <input type="password" name="password" id="password" class='password' placeholder="Enter your password" required>
    <br />
    <input type="password" name="conpassword" id="password"  class='password' placeholder="Enter your password" required>

    <div class="form-btn">
    <button type="submit" name="send"> Send </button>
    </div>
</form>
<?php require "new.php";?>
<script src="js/app.js"></script>

</body>
</html>