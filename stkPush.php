<?php

date_default_timezone_set("Africa/Nairobi");
include("accessToken.php");
$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer '.$accessToken,
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, 1);
$businessShortCode = 174379;
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$timeStamp = date("YmdHis");
$curlPostLoad = [
    "BusinessShortCode" => 174379,
    "Password" => base64_encode($businessShortCode . $passkey . $timeStamp),
    "Timestamp" => $timeStamp,
    "TransactionType" => "CustomerPayBillOnline",
    "Amount" => 1,
    "PartyA" => 254740467735,
    "PartyB" => 174379,
    "PhoneNumber" => 254740467735,
    "CallBackURL" => "http://nyagahtest.000webhostapp.com/daraja/daraja.php",
    "AccountReference" => "projectAwesome",
    "TransactionDesc" => "software priced" 
];

$postLoadFinal = json_encode($curlPostLoad);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postLoadFinal);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response     = curl_exec($ch);
curl_close($ch);
echo $response;