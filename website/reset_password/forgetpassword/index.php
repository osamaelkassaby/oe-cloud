<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> forget my password </title>
</head>
<body>
    <?php session_start();     ?>
    <form method="POST">
        <input type="text" name="fname" id="" required>
        <input type="text" name="lname" id=""  required>
        <?php require "forget.php";?>

        <button type="submit" name="send"> Send </button>
    </form>
    <script src="js/app.js"></script>
</body>
</html>