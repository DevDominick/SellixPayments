<?php


#####################################
#                                   #
#            MARCUS-DEV             # 
#                                   #
#####################################


session_start();


$date = date("Y-m-d H:i:s");   

$url = "https://dev.sellix.io/v1/payments";

$data = json_encode(array(
    "title" => "Add Balance",
    "gateway" => "BTC",
    "value" => "10.00",
    "currency" => "EUR",
    "quantity" => 1,
    "email" => "yourcustomeremail@gmail.com",
    "white_label" => false,
    "confirmations" => 3,
    "webhook" => "https://yourwebsite.com/webhook.php",
    "return_url" => "https://yourwebsite.com/index.php"
    
));

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    // "Content-type: application/x-www-form-urlencoded\r\n" .
    'Authorization: Bearer ' . ''
));
$response = curl_exec($curl);
curl_close($curl);
$finalUrl = strval(json_decode($response)->data->url);

$uqid = strval(json_decode($response)->data->uniqid);

$error = strval(json_decode($response)->error);


?>