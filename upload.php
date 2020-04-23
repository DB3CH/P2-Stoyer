<?php
// Etablerer forbindelse til serveren
require_once "connection.php";

  //anvender $_FILES til at hente forskellige informationer fra den uploadese fil
  $file = $_FILES['file'];


  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  //deler filnavnet ved hvert . for at finde filtypen
  $fileExt = explode('.', $fileName);

  //laver alt tekst til lowercase og vælger den sidste del for at finde filtypen
  $fileActualExt = strtolower(end($fileExt));

  //en array med alle de tilladte filtyper
  $allowed = array('jpg', 'jpeg', 'png', 'raw', 'jpe', 'jif', 'jfif', 'jfi', 'webp', 'heif', 'heic');


  //første if tjekker om filtypen der er uplaoded er en af de tilladte filtyper
  if (in_array($fileActualExt, $allowed)) {
      //Den anden if tjekker at der er 0 fejl under upload af filen
      if ($fileError === 0) {
        //laver et unikt navn til filen inden den bliver lagt i mappen med billeder
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'billeder/'.$fileNameNew;

  //alt den indtastede information om produktet bliver hentet fra post
  $kategori = htmlentities($_POST['kategori']);
  $producent = htmlentities($_POST['producent']);
  $model = htmlentities($_POST['model']);
  $storrelse = htmlentities($_POST['storrelse']);
  $beskrivelse = ($_POST['beskrivelse']);
  $pris = htmlentities($_POST['pris']);


 //sql kode indsætter alt data om produktet og billedenavnet ind på databasen
$sql = "INSERT INTO produkttest (kategori, producent, billede, storrelse, model, pris, beskrivelse)
VALUES ('$kategori', '$producent', '$fileNameNew', '$storrelse', '$model', '$pris', '$beskrivelse')";
            if (mysqli_query($connection, $sql)) {
          move_uploaded_file($fileTmpName, $fileDestination);
          echo "New record created successfully";
          mysqli_close($connection);
          header("location: show.php?uploadsuccess");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }


      }else {
        //hvis der er fejl i upload skrives fejlkode
        echo "Der skete en fejl under upload, prøv igen.";
    }
  } else {
    //hvis den forkerte filtype uploades skrives det
    echo "Denne filtype understøttes ikke.";
  }






// lukker forbindelsen til serveren
mysqli_close($connection);
?>
