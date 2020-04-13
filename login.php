
<?php
//starter en session på siden
session_start();

//henter information fra connection.php, for at skabe kontakt til databasen
require_once "connection.php";

//Første if tjekker om der er trykket på submit knappen
if(isset($_POST['but_submit'])){

    //indsætter den indtastede kode i to variabler
    $uname = mysqli_real_escape_string($connection,$_POST['uname']);
    $kode = mysqli_real_escape_string($connection,$_POST['pwd']);

    //anden if tjekker at variablerne er udfyldt
    if (!empty($uname) && !empty($kode)){

        //sql kode tjekker om uname og kode matcher med hvad der er gemt på databasen
        $sql_query = ("SELECT * FROM users WHERE username='$uname' AND password='$kode'");
        $result = mysqli_query($connection,$sql_query);
        $count = mysqli_num_rows($result);

        //tredje if tjekker at antallet af resultater er over 0, hvilket vil sige at der har været et korrekt match med databasen
        if($count > 0){

            //Starter en session med uname, som viser de andre sider at man er logget ind
            $_SESSION['login'] = $uname;
            header('Location: show.php');

        //Hvis der ikke er match med databsen bliver der skrevet en fejl
        }else{
            echo "Invalid username and password";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<div class="bg-billede">
    <form method="post" action="" class="loginform">
        <div id="div_login">

            <div>
                <input type="text" class="textbox" id="uname" name="uname" placeholder="Admin" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="pwd" placeholder="Kode"/>
            </div>
            <div>
                <input type="submit" value="Log ind" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>


</body>
</html>

<?php
//Lukker forbindelsen til databasen
mysqli_close($connection);
 ?>
