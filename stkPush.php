<?php
//setting correct time zone so that out timestamp is precise
date_default_timezone_set("Africa/Nairobi");

//for us to have the accessToken's scope, we include the accessToken generator code, accessToken.php
include("accessToken.php");

//initializint curl
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer '.$accessToken,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);

//from the test credentials
$businessShortCode = 174379;
$passkey = (//put your app's passkey);

//generate real-time time
$timeStamp = date("YmdHis");

//compose the post's payload
$curlPostLoad = [
    "BusinessShortCode" => 174379,
    "Password" => base64_encode($businessShortCode . $passkey . $timeStamp),
    "Timestamp" => $timeStamp,
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => 1,
    "PartyA" => (//put your number starting 254...,),
    "PartyB" => 174379,
    "PhoneNumber" => (//put your number starting 254...,),
    "CallBackURL" => "put your secure callBack.php's url",
    "AccountReference" => "projectAwesome",
    "TransactionDesc" => "software priced" 
];

//encode post's payload into json
$postLoadFinal = json_encode($curlPostLoad);

//use the post body now
curl_setopt($ch, CURLOPT_POSTFIELDS, $postLoadFinal);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response  = curl_exec($ch);
curl_close($ch);

//at this time, an stk push is already made to the phoneNumber above and we the output the details
echo $response;
