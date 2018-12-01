<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "Hireme";

//create connection
$conn = new mysqli($servername,$username,$password,$dbname);

//check connection
if ($conn -> connect_error){
    
    die("connection Failed: " .$conn -> connect_error);
}

//create tables
$sql = " CREATE TABLE Users(
    id int(6) unsigned auto_increment primary key,
    FirstName varchar(100),
    LastName varchar(100),
    password varchar(100),
    telephone varchar(20),
    email varchar(20),
    date_joined timestamp 
)";

if ($conn -> query($sql) === true){
    echo "Users table created successfully";

    //insert admin data in table
    $sql = "INSERT INTO Users (FirstName, LastName, password, telephone, email)
    VALUES ('Admin', 'Administrator','password123', '876-999-9999', 'admin@hireme.com')";
    if ($conn -> query($sql) === true){
        echo "Record successfully added";
    }
    else{
        echo "error" . $sql . "<br>". $conn ->error;
    }
}
else{
    echo "error creating users table: " . $conn ->error;

}

$sql = "CREATE TABLE Jobs(
    id int(6) unsigned auto_increment primary key,
    job_title varchar(20),
    job_description varchar(255),
    category varchar(30),
    company_name varchar(30),
    company_location varchar(50),
    date_posted timestamp
)";

if ($conn -> query($sql) === true){
    echo "Jobs table created successfully";

}
else{
    echo "error creating jobs table: " . $conn ->error;

}

$sql = "CREATE TABLE Jobs Applied For(
    id int(6) unsigned auto_increment primary key,
    job_id varchar(20),
    user_id varchar(20),
    date_applied timestamp
)";

if ($conn -> query($sql) === true){
    echo "Jobs Applied for table created successfully";
}
else{
    echo "error creating Jobs Applied for table: " . $conn ->error;

}

&conn -> close();
?>
