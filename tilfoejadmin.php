
<?php
// Etablerer forbindelse til serveren
require_once "connection.php";

if (isset($_POST['register'])) {
  //Tager informationen fra formen og sætter den i variabler, HTMLentities sørger for at det ikke er skrevet kode i formen.
    $username = ($_POST['username']);
    $kode = ($_POST['password']);


  //Sætter sql query til at indsætte data i en variabel
  $sql = "INSERT INTO users (username, password)

  VALUES ('$username', '$kode')";

  //if staement viser om dataen er skrevet eller om der er en error
  if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }

  //header sender brugeren videre til show.php
  header("location: show.php");
}

 ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tilføj admin</title>

</head>

<body>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" name="signup-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>

    <div class="form-element">
        <label>Password</label>
        <input type="text" name="password" required />
    </div>
    <button type="submit" name="register" value="register">Register</button>
</form>


<footer>
	<a href="show.html">back</a>
</footer>
</body>
</html>

<?php
// lukker forbindelsen til serveren
mysqli_close($connection);
?>
