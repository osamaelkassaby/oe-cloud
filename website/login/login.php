
<?php
include("tools/ip.php"); 

if(isset($_POST['login'])){
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$username' OR username = '$username' AND PASSWORD = '$password'";


    $res   = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count >0){
        while($row = mysqli_fetch_assoc($res)){
            if($row['active'] == 1){
                $_SESSION['id']        = $row['id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname']  = $row['lastname'];
                $_SESSION['username']  = $row['username'];
                $_SESSION['email']     = $row['email'];
                $_SESSION['password']  = $row['password'];
                $_SESSION['user_id']   = $row['user_id'];
                $_SESSION['token']     = $row['token'];
                ipInfo_mysql_from_session($row["username"] , $row['user_id']);
                header('Location:'.URL.'/profile');
            }else{
                echo "<div class='err'> <p> YOUR ACOUNT IS NOT ACTIVE </p> </div>" ;
            }
          
        }
    }else{
       echo "<div class='err'> <p> USERNAME OR PASSWORD IS NULL <p> </p></div>";
    }
}



?>