<?php 
 
// // IP address 
// $userIP = $_SERVER['REMOTE_ADDR'];
// echo $userIP;
// echo json_encode($_SERVER['HTTP_USER_AGENT']);
//  $apiURL = "ipinfo.io/$userIP?token=65f8ed7d45b78d"; 
 
// // Create a new cURL resource with URL 
// $ch = curl_init($apiURL); 
 
// // Return response instead of outputting 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
// // Execute API request 
// $apiResponse = curl_exec($ch); 
 
// // Close cURL resource 
// curl_close($ch); 
 
// // Retrieve IP data from API response 
// $ipData = json_decode($apiResponse, true); 

// echo "<pre> ";

// print_r($ipData);

// echo "</pre> ";

//  echo "<h1> IP :  ". $ipData["ip"] . "</h1>";
//  echo "<h1> Hostnme : ". $ipData["hostname"] . "</h1>";
//  echo "<h1> City :  ". $ipData["city"] . "</h1>";
//  echo "<h1> region : ". $ipData["region"] . "</h1>";
//  echo "<h1> Country : ". $ipData["country"] . "</h1>";
//  echo "<h1> Loc : ". $ipData["loc"] . "</h1>";
//  echo "<h1> Org : ". $ipData["org"] . "</h1>";
//  echo "<h1> Timezone : ". $ipData["timezone"] . "</h1>";

function ipInfo_session(){
// IP address 
$userIP = $_SERVER['REMOTE_ADDR'];
$os     = $_SERVER['HTTP_USER_AGENT'];
$apiURL = "ipinfo.io/$userIP?token=65f8ed7d45b78d"; 
$ch = curl_init($apiURL); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$apiResponse = curl_exec($ch); 
curl_close($ch); 
$ipData = json_decode($apiResponse, true); 
   $hostname = $ipData["hostname"];
   $city = $ipData["city"];
   $region = $ipData["region"];
   $country = $ipData["country"];
   $loc = $ipData["loc"];
   $ISP = $ipData["org"];
   $timezone = $ipData["timezone"];
   $_SESSION["ip"] = $userIP;
   $_SESSION["hostname"] = $hostname;
   $_SESSION['city'] = $city;
   $_SESSION['region'] = $region;
   $_SESSION['country'] = $country;
   $_SESSION['loc'] = $loc;
   $_SESSION['isp'] = $ISP;
   $_SESSION['timezone'] = $timezone;

}


function ipInfo_mysql_from_session(){
     $city = $_SESSION['city'];
     $region = $_SESSION['region'];
     $country = $_SESSION['country'];
     $loc = $_SESSION['loc'];
     $IP = $_SESSION['ip'];
     return $username;
    }

?>