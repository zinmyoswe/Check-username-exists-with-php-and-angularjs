<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

// Username
$uname = $data->username;
    
$resText = '';

if($uname != ''){
    // Check username
    $sel = mysqli_query($con,"select count(*) as allcount from users where username = '".$uname."' ");
    $row = mysqli_fetch_array($sel);

    $resText = "Available";
    if($row['allcount'] > 0){
        $resText = 'Not available';
    }
}

echo $resText;