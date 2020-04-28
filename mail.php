<?php

echo "hej";

$email = 'nikolaj.odby76@gmail.com';


$email_address = $_POST['email'];
$navn = $_POST['navn'];
$efternavn = $_POST['efternavn']
$addresse = $_POST['adresse'];
$postnummer = $_POST['postnummer'];
$by = $_POST['by'];
$land = $_POST['land'];
$telefonnumer = $_POST['telefonnumer'];


if( empty($errors))
{
$to = $email;
$email_subject = "Køb fra: $navn $efternavn";
$email_body = "Du har modtaget en ny odrer ".
" Oplysninger:\n Navn: $navn $efternavn \n ".
"Email: $email_address\n Send til $adresse i $by, $land";
$headers = "From: $minmail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: shop.php');
}
?>