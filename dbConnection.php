<?php
$dbConn = new mysqli("localhost", "mathenoi_money", "nyagah.DB", "mathenoi_money");

if(!$dbConn)
die("Error in database connection, please check your database connection or try again after few minutes ".mysqli_error($dbConn));
