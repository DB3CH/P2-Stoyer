
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

</head>
<body>
<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="uname" name="uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="pwd" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>
</body>
</html>

