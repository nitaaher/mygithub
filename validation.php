<?php 
					
                        $nameErr = $emailErr = $mobileErr = $addressErr = "";
						$name = $emailid = $mobile = $address= "";

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
					   if (empty($_POST["name"])) {
					   $nameErr = "Name is required";
					   } else {
					   $name = $_POST["name"];
					   if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
					   $nameErr = "Only letters and white space allowed";
						}
					}
	  
					   if (empty($_POST["emailid"])) {
							 $emailErr = "Email is required";
						} else {
						  $emailid = $_POST["emailid"];
						if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
						 $emailErr = "Invalid email format";
						 }
					   }
	
					   if (empty($_POST["mobile"])) {  
					   $mobileErr = "Mobile no is required";  
						} else {  
						 $mobile = $_POST["mobile"]; 
						 if (!preg_match ("/^[0-9]*$/", $mobile) ) {  
					   $mobileErr = "Only numeric value is allowed.";  
						}  
					   if (strlen ($mobile) != 10) {  
					   $mobileErr = "Contact no must contain 10 digits.";  
					   }  
					}  
	  
					  if (empty($_POST["address"])) {
					  $messageErr = "Address is required";
					  } else {
						  $message = $_POST["message"];
					  }
                    }
?>