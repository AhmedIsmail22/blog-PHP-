<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "blog_sun_offline_39";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);



// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//     echo "Connected successfully";
//   }
//   else {
//       echo "Connection Successful.";
//   }