<?php

require 'config.php';

//declare variables
$title = "";
$description = "";
$category = "";
$company = "";
$location = "";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//store form data in variables
    
	$title = inputCheck($_POST["title"]);
	$description = inputCheck($_POST["description"]);
	$category = inputCheck($_POST["category"]);
  	$company = inputCheck($_POST["company"]);
	$location = inputCheck($_POST["location"]);


	//Insert in to table
	$sql = "INSERT INTO Jobs (job_title, job_description, category, company_name, company_location)
	VALUES('$title','$description', '$category', '$company', '$location')";


}


?>