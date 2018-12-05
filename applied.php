<?php

require 'config.php';

//declare variables
$title = "";
$description = "";
$category = "";



if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//store form data in variables
    
	$title = inputCheck($_POST["title"]);
	$description = inputCheck($_POST["description"]);
	$category = inputCheck($_POST["category"]);



	//Insert in to table
	$sql = "INSERT INTO Jobs Applied For (job_title, job_description, category)
	VALUES('$title','$description', '$category')";


}


?>