<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tilføj admin</title>

</head>

<body>


<form name="tilfoej" id="tilfoejform" method="post" action="phptilfoejadmin.php" >
	
  <div>
    <label for="uname">Admin navn</label>
    <input type="text" name="uname" id="uname" required size="40" maxlength="60" placeholder="Vælg navn">
  </div>
  
  <div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required size="40" maxlength="60" placeholder="Vælg kode">
  </div>

   
    <input type="submit" id="addBtn" value="add">
  </div>

</form>




<footer>
	<a href="homepage.html">back</a>
</footer>
</body>
</html>