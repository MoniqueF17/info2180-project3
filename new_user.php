<?php
//declare variables
$fname = "";
$lname = "";
$pword = "";
$pwordHash = "";
$email = "";
$tele = "";

//initialize variables
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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //store form data in variables
    $fname = inputCheck($_POST["fname"]);
    $lname = inputCheck($_POST["lname"]);
    $pword = inputCheck($_POST["pword"]);
    $email = inputCheck($_POST["email"]);
    $tele = inputCheck($_POST["tele"]);

    //validate form data
    if (!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z]*$/",$lname)){
        echo "<script type = 'text/javascript'> alert("Only letters are allowed in tis field"); </script>";
    }
    
    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}$/",$pword)){
        echo "<script type = 'text/javascript'> alert("Password is insufficient\nPlease enter a valid password"); </script>";
    }
    
    if (emailValidator($email) == false){
        echo "<script type = 'text/javascript'> alert("Not a valid email address"); </script>";
	
	}
	
    if (!preg_match("/^(()?\d{3}())?(-|\s)?\d{3}(-|\s)?\d{4}$/",$tele)){
        echo "<script type = 'text/javascript'> alert("Invalid number format"); </script>";
    }

}

//hash password
$pwordHash = password_hash($pword, PASSWORD_DEFAULT);

//Insert data into table

$sql = "INSERT INTO Users " . "(FirstName, LastName, password, telephone, email)". "VALUES('$fname','$lname', '$pwordHash', '$tele', '$email')";





//Checks if email is valid
function emailValidator($email){
    //check that there's one @ symbol
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        return false;
    }
    //Split address into sections
    $e_array = explode("@", $email);
    $l_array = explode(".", $e_array[0]);
    for ($i = 0; $i < sizeof($l_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $l_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $e_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $d_array = explode(".", $e_array[1]);
        if (sizeof($d_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($d_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $d_array[$i])) {
                return false;
            }
        }
    }

    return true;
}

//Cleans input from user
Function inputCheck($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>
