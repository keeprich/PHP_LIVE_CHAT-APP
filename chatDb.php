<?php
$host = "localhost";
$user = "root";
$password = "mysql";
$db_userName = "test";

// creating connection
$conn = mysqli_connect ($host, $user, $password, $db_userName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// time format function

function formate_date ($date) {
    return date('g:i a', strtotime($date));
    // $today = date("D M j G:i:s T Y"); 
}
?>