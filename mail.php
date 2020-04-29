<?php



$email_address = $_POST['email'];
$navn = $_POST['navn'];
$efternavn = $_POST['efternavn'];
$addresse = $_POST['adresse'];
$postnummer = $_POST['postnummer'];
$by = $_POST['by'];
$land = $_POST['land'];
$telefonnumer = $_POST['telefonnumer'];


	$email_from = 'nikolaj.odby76@gmail.com';

	$email_subject = "Ny bestilling";

	$email_body = "Der er en ny odrer fra $navn.\n".
                            "Her er adressen:\n $adresse".




  $to = "nikolaj.odby76@gmail.com";

  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $email_address \r\n";

  mail($to,$email_subject,$email_body,$headers);

 ?>
