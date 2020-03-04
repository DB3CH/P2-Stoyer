<?php
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


<?php
session_start();
    $cartArray = array(
 $id=>array(
 'model'=>$model,
 'producent'=>$producent,
 'pris'=>$pris,
 'maengde'=>1,
 'beskrivelse'=>$beskrivelse)
);
    if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($id,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
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

    <input type='hidden' name='id' value=".$row['id']." />

    <div class='producent'>".$row['producent']."</div>

    <div class='model'>".$row['model']."</div>

    <div class='pris'>kr.".$row['pris']."</div>

    <button type='submit' class='buy'>Køb Nu</button>
    </form>
    </div>";
        }
mysqli_close($con);
?>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="kurv.php">Kurv<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>
<br>
<a href="webshop.php">Tilbage</a>

</body>
</html>

<?php
mysqli_close($connection);
?>