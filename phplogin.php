<?php
require_once "connection.php";

if(isset($_POST['but_submit'])){

    $uname = $_POST['uname'];

    $pwd = $_POST['pwd'];

if (empty($uname) || empty($pwd) ) {
header('location: login.php')};

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $kode = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $kode != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$kode."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: show.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
 