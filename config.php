<?php
//initialize variables
$servername = "localhost";
$username = "admin";
$password = "password123";
$dbname = "Hireme";


//create connection
try{
    $conn = new PDO("mysql:host = $servername; dbname = Hireme", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
    
//Cleans input from user
Function inputCheck($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}   
    
?>