<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div class = "header">
            <h5><strong>HireMe</strong><h5>

	    </div>

	    <div class= "leftbar">
		    <p><img src = "home.png" alt = "home page icon"><a href="dashboard.html">Home</a></p>
		    <p><img src = "add-user.png" alt = "add user icon"><a href="new_user_form.html">New User</a></p>
		    <p><img src = "create.png" alt = "new job icon"><a href="new_job.html" target="_blank">New Job</a></p>
		    <p><img src = "shutdown.png" alt = "logout icon"><a href="index.html" onclick="logout.php" target="_blank">Logout</a></p>

    	</div>
    	<div class= "content">
    	     <br><br> <h2>Dashboard</h2><a href = "new_job.html" class = "button">Post A Job</a>
    	     
    	     
    	     
    	     <!--<input type="button" class="post" value="Post a Job" a href ="new/>-->
    	    <br><br>  <br><br>  <br><br>
    	    
    	    <section>
    	        <div class="available">
    	            <h3><strong>Available Jobs</strong></h3>
    	            <table>
    	                <thead>
    	                    <tr>
    	                        <th>Company</th>
    	                        <th>Job Title</th>
    	                        <th>Category</th>
    	                        <th>Date</th>
    	                    </tr>
    	               </thead>
    	               
    	               <tbody>
    	                   <?php
    	                   
   	                    session_start();
    	                   
    	                   $con = mysqli_connect("localhost", "admin", "password123");
    	                   if(!$con){
    	                   die("Cannot connect: ".mysql_error());}
    	                   
    	                   $result=$con->query("SELECT * FROM Jobs");
    	                   $result->execute();
    	                       echo "<tr>";
    	                       echo "<td>". ['company_name'] . "</td>";
    	                       echo "<td>". ['job_title'] . "</td>";
    	                       echo "<td>". ['category'] . "</td>";
    	                       echo "<td>". ['date_posted'] . "</td>";
    	                   
    	                   ?>


    	                   
    	                   
    	               </tbody>
    	            </table>
    	            
    	        </div> <br><br>  <br><br>  <br><br>
    	        <div class="applied">
    	            <h3><strong>Jobs Applied For</strong></h3>
    	            <table>
    	               <thead>
    	                    <tr>
    	                        <th>Company</th>
    	                        <th>Job Title</th>
    	                        <th>Category</th>
    	                        <th>Date</th>
    	                    </tr>
    	               </thead>
    	            </table>
    	            
    	        </div>
    	    </section>
    	   
    	    
    	    
    	    
    	</div>
	
	
    </body>
</html>