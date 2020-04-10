<?php
require_once "connection.php";

if (isset($_POST['submit'])) {

  $file = $_FILES['file'];
  print_r($file);

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'raw', 'jpe', 'jif', 'jfif', 'jfi', 'webp', 'heif', 'heic');

  if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'billeder/'.$fileNameNew;


        $navn = ($_post['navn']);


        $sql = "INSERT INTO billeder (navn, billede) VALUES ('$navn', '$fileNameNew')";

            if (mysqli_query($connection, $sql)) {
          move_uploaded_file($fileTmpName, $fileDestination);
          echo "New record created successfully";
          header("location: index.php?uploadsuccess");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }


      }else {
        echo "Der skete en fejl under upload, prøv igen.";
    }
  } else {
    echo "Denne filtype understøttes ikke.";
  }

}
 ?>

 <?php
mysqli_close($connection);
?>
