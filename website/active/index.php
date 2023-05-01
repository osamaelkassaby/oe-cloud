<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Active</title>
</head>
<body>
    

<?php 
session_start();

if($_SESSION){
    echo "<div class='alert-err'> <p> username ".$_SESSION['username']." is Already Active";
}

?>

<div class="div-text"> <p> Please Enter code </p>  </div>

<div class="form">
<form method="POST">
    <input type="text" id="a1" name="a1" maxlength="1"  onkeyup="jump(this , 'a2')" required>
    <input type="text" id="a2" name="a2" maxlength="1"  onkeyup="jump(this , 'a3')" required>
    <input type="text" id="a3" name="a3" maxlength="1"  onkeyup="jump(this , 'a4')" required>
    <input type="text" id="a4" name="a4" maxlength="1"  onkeyup="jump(this , 'a5')" required>
    <input type="text" id="a5" name="a5" maxlength="1"  onkeyup="jump(this , 'a6')" required>
    <input type="text" id="a6" name="a6" maxlength="1"   required>
    <br />
    <div class="form-btn">
    <button type="submit" name="active"> active </button>
    </div>
</form>


</div>



<?php require "active.php"; ?>


<script src="js/app.js"></script>

</body>
</html>