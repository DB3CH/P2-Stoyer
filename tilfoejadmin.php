

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tilføj admin</title>

</head>

<body>


<form method="post" action="phptilfoejadmin.php" name="signup-form">
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