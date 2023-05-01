<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oe Cloud </title>
</head>
<body>
    Welcome to oe Cloud
    <audio id="myAudio" autoplay controls>
  <source src="oe.ogg" type="audio/ogg">
  <source src="oe.mp3" type="audio/mpeg">

  Your browser does not support the audio element.
</audio>



<button onclick="myFunction()">Try it</button>

 <script>
var source = "oe.mp3"
var audio = document.createElement("audio");
audio.load()
audio.addEventListener("load", function() {
  audio.play();
}, true);
audio.src = source;
audio.play();

 </script>


<form method="post" enctype="multipart/form-data">
<input type="file" name="file">
<button name="send" type="submit"> send </button>

</form>

<?php
if(isset($_POST['send'])){
  $file_name =  $_FILES['file']['name']; 
  $tmp_name = $_FILES['file']['tmp_name']; 
  $file_up_name = $file_name; 
  move_uploaded_file($tmp_name, "files/".$file_up_name); 
}
 
?>



</body>
</html>