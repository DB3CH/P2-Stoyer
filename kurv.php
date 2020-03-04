<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["id"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['id'] === $_POST["id"]){
        $value['maengde'] = $_POST["maengde"];
        break; // Stop the loop after we've found the product
    }
}
   
}
?>


<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<table class="table">
<tbody>
<tr>
<td></td>
<td>Model</td>
<td>Mængde</td>
<td>Pris</td>
<td>Total mængde</td>
</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["model"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Slet Item</button>
</form>
</td>
<td>
<form method='post' action='kurv.php'>
<input type='hidden' name='code' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='maengde' class='quantity' onChange="this.form.submit()">
<option <?php if($product["maengde"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["maengde"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["maengde"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["maengde"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["maengde"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["pris"]; ?></td>
<td><?php echo "$".$product["pris"]*$product["maengde"]; ?></td>
</tr>
<?php
$total_price += ($product["pris"]*$product["maengde"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>