<?php
require_once 'connection.php';

if(isset($_GET['id'])){
	
	$id=htmlentities($_GET['id']);
	
	if(!empty($id)){
		
		$query = "DELETE FROM produkttest WHERE id= $id ";
		
		$results = mysqli_query($connection,$query);
		
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