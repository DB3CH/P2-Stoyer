<?php
require_once "connection.php";


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Show SQL</title>
</head>

<body>

<h1>Show data</h1>

<table>
<tr>
    <th>Navn</th>
    <th>Efternavn</th>
  </tr>
<?php 
$sql = "SELECT navn, efternavn FROM testtable";
$result = $connection->querry($sql); 

while ($row = $result->fetch_assoc()) {
  echo "<tr>"
  //echo "<td>".$row["navn"]."</td>";
  echo "</tr>"
}

?>

</table>

<footer>
	<a href="insert.php">back</a>
</footer>
</body>
</html>

<?php
mysqli_close($connection);
?> 