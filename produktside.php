<?php
session_start();
require_once 'connection.php';

if(isset($_GET['id'])){
	//id fra URL bliver sat i en variabel
    $id=htmlentities($_GET['id']);


	if(!empty($id)){
		//$query indeholder sql kode der sletter alt indehold med den givne id
		$query = "SELECT * FROM produkttest WHERE id= $id ";

        $results = mysqli_query($connection,$query);


        $row = mysqli_fetch_assoc($results);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['model']; ?></title>
	<meta charset="utf-8">
</head>

<body>

<?php
$result = mysqli_query($connection,"SELECT * FROM `produkttest`WHERE id= $id");
while($row = mysqli_fetch_assoc($result)){

    echo "<div class='product_wrapper'>

    <form method='post' action='kurv.php'>



    <div class='producent'>".$row['producent']."</div>

    <div class='model'>".$row['model']."</div>

    <div class='pris'>kr.".$row['pris']."</div>

		<input type='hidden' name='id' value=".$row['id']." />

    <button type='submit' class='buy'>Køb Nu</button>
    </form>
    </div>";
  }

?>
<br>
<a href="webshop.php">Tilbage</a>

</body>
</html>

<?php
mysqli_close($connection);
?>
