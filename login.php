
<?php
session_start();
require_once "connection.php";

if(isset($_POST['but_submit'])){


    $uname = $_POST["username"];
    $kode = $_POST["password"];


    $uname = mysqli_real_escape_string($connection,$_POST['uname']);
    $kode = mysqli_real_escape_string($connection,$_POST['pwd']);

    if (!empty($uname) && !empty($kode)){

        $sql_query = ("SELECT * FROM users WHERE username='$uname' AND password='$kode'");
        $result = mysqli_query($connection,$sql_query);
        $count = mysqli_num_rows($result);

        if($count > 0){
            $_SESSION['login'] = $uname;
            header('Location: show.php');
        }else{
            echo "Invalid username and password";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<div class="bg-billede">
    <form method="post" action="" class="loginform">
        <div id="div_login">
         
            <div>
                <input type="text" class="textbox" id="uname" name="uname" placeholder="Admin" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="pwd" placeholder="Kode"/>
            </div>
            <div>
                <input type="submit" value="Log ind" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>


</body>
</html>

