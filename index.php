<?php
$name = array("Nyagah Kelvin Mbugua");
$likes = array("Sleeping","Adventure","Football","Positive Collaboration","Coding","Eating");
$whatToCoverHere = array("AUTHORIZATION (accessToken Generation)","MPESA EXPRESS (stkpush)");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>My name is</h1>
    <?php 
    for ($i = 0; $i < count($name); $i++) {
            echo $name[ $i ];
            echo "&nbsp;&nbsp;";
        }?>

<h1>I do like</h1>
    <?php 
    for ($i = 0; $i < count($likes); $i++) {
            echo $likes[ $i ];
            echo "&nbsp;&nbsp;";
        }?>

<h1>And we will be covering</h1>
    <?php 
    for ($i = 0; $i < count($whatToCoverHere); $i++) {
        echo $i + 1 . ". ";
            echo $whatToCoverHere[ $i ];
            echo "<br>";
        }?>

</body>
</html>

