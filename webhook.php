<?php


#####################################
#                                   #
#            MARCUS-DEV             # 
#                                   #
#####################################


$payload = file_get_contents('php://input');

$secret = ""; // replace with your webhook secret
$header_signature = $_SERVER["HTTP_X_SELLIX_SIGNATURE"]; // get our signature header

$signature = hash_hmac('sha512', $payload, $secret);
if (hash_equals($signature, $header_signature)) {

    $jsonString = file_get_contents("php://input");


    $jsonString = json_decode($jsonString, true);

    $event = $jsonString['event'];
    $data = $jsonString['data'];
    $uqid = $data['uniqid'];
    $status = $data['status'];

    if($status == 'COMPLETED'){

        // change datavaules in database?

    }

}
?> 