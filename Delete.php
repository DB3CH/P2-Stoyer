<?php
require_once 'connection.php';
// Med _GET funktionen bliver id'et fra URL hentet
if(isset($_GET['id'])){
	//id fra URL bliver sat i en variabel
	$id=htmlentities($_GET['id']);
	
	if(!empty($id)){
		//$query indeholder sql kode der sletter alt indehold med den givne id
		$query = "DELETE FROM produkttest WHERE id= $id ";
		
		$results = mysqli_query($connection,$query);

		//hvis der bliver slettet bliver der henvist til show.php, ellers fejlmeddelelse
		if($results){
		header("Location: show.php");
		exit();
		}else{
			die("could not query the database" .msqli_error());
		}
	
	
	}
}

mysqli_close($connection);

?>