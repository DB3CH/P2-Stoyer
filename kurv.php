<?php
session_start();
require_once "connection.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM testtable WHERE id = $id"

    $result = mysqli_query($sql)

    if ($result) {
      $_sess
    }
}

 ?>
