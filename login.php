<?php

include 'config.php';

session_start();

$fname = inputCheck($_POST["fname"]);
$pword = inputCheck($_POST["pword"]);
header('location: dashboard.php');


function login($fname,$pword){
    if (!preg_match("/^[a-zA-Z]*$/",$fname)){
            echo "<script type = 'text/javascript'> alert('Only letters are allowed in this field'); </script>";

        }
    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8}$/",$pword)){
            echo "<script type = 'text/javascript'> alert('Password is insufficient\nPlease enter a valid password'); </script>";
        
        }
    $pword = password_hash($pword, PASSWORD_DEFAULT);
    
    $sql = "SELECT firstName, password FROM Users WHERE firstName = '$fname' and password = '$pword'"; 
    $result = $conn -> query($sql);
    
    if ($result -> rowCount() == 1){
        session_register("$fname");
        $_SESSION['login_user'] = $fname;
        
        //Insert code to display dashboard here
    }
    else{
        $error = "<script type = 'text/javascript'> alert('Invalid login info'); </script>"; 
        echo $error;
    }
   
}

?>











