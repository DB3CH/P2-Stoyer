<?php
session_start();

// tjekker om man er logget in
if(!isset($_SESSION['login'])){
    header('Location: login.php');
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert  </title>
	<meta charset="utf-8">
</head>

<body>
<!-- Form hvor data kan indsættes, post = videre til phpaction, hvor det bliver sat på databasen. -->
	<form action="phpaction.php" method="POST">
        <label>Kategori:</label>
        <input type="text" id="kategori" name="kategori">
        <Lable>Producent:</Lable>
        <input type="text" id="producent" name="producent">
        <Lable>Model:</Lable>
        <input type="text" id="model" name="model">
        <Lable>Beskrivelse:</Lable>
        <input type="text" id="beskrivelse" name="beskrivelse">
        <Lable>Pris:</Lable>
        <input type="number" min="0.00" max="999999.00" step="1.00" id="pris" name="pris">

        <input type="submit" value="Indsæt">

    </form>

</body>
</html>
