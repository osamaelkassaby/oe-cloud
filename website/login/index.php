<?php session_start();     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login | Register</title>
</head>
<body>
<?php require "login.php"; 
?>
        <!-- <div class="form-group">
            <div class="form-group-inputs">
            <input type="username" name="username" placeholder="Username" require>
            <br>
            <input type="password" name="password" placeholder="Password" require>
            <br>
            <a href="http://oe.com/reset_password"> forget password</a> </a>
            <br>
            <button type="submit" name="login"> Login </button>
            </div>
      
        </div> -->
      
        


        <div class="overlay">
<!-- LOGN IN FORM by Omar Dsoky -->
<form method="POST" enctype="multipart/form">
   <!--   con = Container  for items in the form-->
   <div class="con">
   <!--     Start  header Content  -->
   <header class="head-form">
   <h2>Log In</h2>
      <p>login here using your username and password</p>
   </header>
   <br>
   <div class="field-set">
     
    
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
       
         <input class="form-input" id="txt-input" type="text"  name="username" placeholder="@UserName" required>
     
      <br>
     
      <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
      <input class="form-input"  type="password" placeholder="Password" id="pwd"  name="password" required>
     
     
     
     
      <br>

      <button class="log-in" name="login" typpe='submit'> Log In </button>
   </div>
  
   <div class="other">
      <button class="btn submits frgt-pass" onclick="window.open('http://oe.com/reset_password');">Forgot Password</button>
      <button class="btn submits sign-up" onclick="window.open('http://oe.com/register');">Sign Up 
      <i class="fa fa-user-plus" aria-hidden="true"></i>
      </button>
   </div>
     
  </div>
  
</form>

</div>











<?php 

if($_SESSION){
    header("Location:".URL."/profile");
}

?>
<script src="js/app.js"></script>
</body>
</html>