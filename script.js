window.onload = function(){
 
	var fname = document.getElementById("fname");
	var lname = document.getElementById("lname");
	var pword = document.getElementById("pword");
	var email = document.getElementById("email");
	var telephone = document.getElementById("telephone");
	var submitbtn = document.getElementById("submit");

	var letterRegex = /^[A-Za-z]+$/;
	var pwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/;
	var emailRegEx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	var numRegex = /^(()?\d{3}())?(-|\s)?\d{3}(-|\s)?\d{4}$/;


	submitbtn.onclick = function(){
		if (fname.value.match(letterRegex) && lname.value.match(letterRegex)){
			if (pword.value.match(pwordRegex)){
				if (email.value.match(emailRegEx)){
					if (telephone.value.match(numRegex)){
						
					}
					else{//invalid number
						alert("Not a valid telephone number format\nPlease make a valid entry");
					}
					
				}
				else{//invalid email
					alert("Not a valid email format\nPlease enter a vaild email");	
				}
				
			}	
			else{//invalid password
				alert("Password invalid\nMust contain one letter, one capital letter, a number and be 8 characters long");
			}
		}
		else{//invalid name
			alert("Names consist of letters only\nPlease make a valid entry");
		}

	}
	
	 var httpRequest;
        
        makeRequest();
        
        function makeRequest(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = request;
            httpRequest.open('POST', "/new_user.php", true);
            httpRequest.send();
        }
        
        function request(){
            if (httpRequest.readyState === XMLHttpRequest.DONE){
                if (httpRequest.status === 200){
                    document.getElementById('result').innerHTML = httpRequest.responseText;
                } else {
                    alert('Bad request');
                }
            }
	
}
};