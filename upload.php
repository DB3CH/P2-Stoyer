<?php
// Etablerer forbindelse til serveren
require_once "connection.php";


  $file = $_FILES['file'];


  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'raw', 'jpe', 'jif', 'jfif', 'jfi', 'webp', 'heif', 'heic');

//Tager informationen fra formen og sætter den i variabler, HTMLentities sørger for at det ikke er skrevet kode i formen. 

  if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'billeder/'.$fileNameNew;

  $kategori = ($_POST['kategori']);
  $producent = ($_POST['producent']);
  $model = htmlentities($_POST['model']);
  $beskrivelse = ($_POST['beskrivelse']);
  $pris = htmlentities($_POST['pris']);


 //Sætter sql query til at indsætte data i en variabel
$sql = "INSERT INTO produkttest (kategori, producent, billede, model, pris, beskrivelse)
VALUES ('$kategori', '$producent','$fileNameNew', '$model', '$pris', '$beskrivelse')";
            if (mysqli_query($connection, $sql)) {
          move_uploaded_file($fileTmpName, $fileDestination);
          echo "New record created successfully";
          header("location: show.php?uploadsuccess");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }


      }else {
        echo "Der skete en fejl under upload, prøv igen.";
    }
  } else {
    echo "Denne filtype understøttes ikke.";
  }






// lukker forbindelsen til serveren
mysqli_close($connection);
?>