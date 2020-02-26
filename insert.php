<!DOCTYPE html>
<html>
<head>
	<title>Insert  </title>
	<meta charset="utf-8">
</head>

<body>
<!-- Form hvor data kan indsættes, videre til phpaction, hvor det bliver sat på databasen. -->
	<form action="phpaction.php" method="POST">
        <label>Navn:</label>
        <input type="text" id="navn" name="navn">
        <Lable>Efternavn:</Lable>
        <input type="text" id="efternavn" name="efternavn"> 
        <input type="submit" value="Indsæt">
    </form>
</body>
</html>
