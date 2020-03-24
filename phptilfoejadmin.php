<?php
 require_once 'databasetjek.php';

  $uname = htmlentities($_POST['uname']);
  $password = htmlentities($_POST['password']);

  

$sql = "INSERT INTO admintest (uname, password)
VALUES ('$uname', '$password')";

if (mysqli_query($connection, $sql)) {
    echo "New Admin created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}





mysqli_close($connection);
?>