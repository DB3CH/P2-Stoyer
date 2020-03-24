<?php
 
include('connection.php');
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
 
</head>
<body>
 <form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="kode" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>
</body>
</html>




