<?php
    
    	
  	$firstName = $_POST['firstNameInput'];
	$lastName  =  $_POST['lastNameInput'];
	$email	   = 	 $_POST['emailInput'];
	$phone 	   = 	 $_POST['phoneInput'];
	$preferred = $_POST['preferredInput'];
	$comment   = 		  $_POST['mymsg'];
	
	
	
	if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($preferred) || empty($comment)){
			die ("Are you drunk already? Fill out ALL sections. <br><a href='rsvp.php'>Try again!</a>");	
	}
	
	
	
	
	function myGuests($first,$last,$email,$phone,$preferred,$comment) {
    
    	$fileName = "guests.csv";
		$fileMode = "a+";
		$date = date("Y-m-d H:i:s");
		
		$textToWrite = $first. "|" .$last."|" .$email."|" .$phone."|" .$preferred. "|" .$comment."\n";
	
		$handler = fopen($fileName, $fileMode);
		fwrite($handler, $textToWrite);
		fclose($handler);
    	
    }
	
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		die("You messed up your own email.<br><br><a href='rsvp.php'>Try again!</a>");
	}
	
	if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)){
			die("Use dashes when typing your phone number please.<br><br><a href='rsvp.php'>Try again!</a");
	}
	

	echo "<p> <font color=pink size='100pt'> Thanks for the RSVP!! See you soon!</font> </p>
	
		  <br><br><a href='rsvp.php'>Home page</a>
		  
	";

	
myGuests($firstName, $lastName, $email, $phone, $preferred, $comment);
	
		
  $ryanMail = "ryan.rodd@gatech.edu";
  $subject  = "$firstName Party Confirmation";
  $body     = "I lied there is no party.";
  
  mail($ryanMail, $subject, $body);
  
  
  
?>