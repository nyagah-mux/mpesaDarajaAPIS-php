<?php

include_once("dbConnection.php");

header("Content-Type: application/json");
$stkCallbackResponse = file_get_contents("php://input");
$logFile = "mpesaStkResponse.json";
$log = fopen($logFile, "wr+");
fwrite($log, $stkCallbackResponse);
fclose($log);

$resultJson = json_decode($stkCallbackResponse);
$resultcode = $resultJson->Body->stkCallback->ResultCode;

if ($resultcode === 0) {
    $amount = $resultJson->Body->stkCallback->CallbackMetadata->Item[0]->Value;
    $receiptNumber = $resultJson->Body->stkCallback->CallbackMetadata->Item[1]->Value;
    $transactionDate = $resultJson->Body->stkCallback->CallbackMetadata->Item[3]->Value;
    $mobileNumber = $resultJson->Body->stkCallback->CallbackMetadata->Item[4]->Value;

    $sql = "insert into `pays` (number, date, receipt, amount) values('$mobileNumber' , '$transactionDate ', '$receiptNumber', '$amount')";

    $results = mysqli_query($dbConn, $sql);

    if (!$results) {
        die("error in datase insertion " . mysqli_error($dbConn));
    }
}