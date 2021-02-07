<?php


$servername = "amankedia.c4kez4yk21j6.ap-south-1.rds.amazonaws.com";
$username = "admin";
$password = "password";
$dbname = "amankedia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = trim(stripslashes($_POST['contactName']));
$email = trim(stripslashes($_POST['contactEmail']));
$subject = trim(stripslashes($_POST['contactSubject']));
$contact_message = trim(stripslashes($_POST['contactMessage']));

$sql = "SELECT * FROM query";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

// $sql = "INSERT INTO query (fname, email, sub, msg)
// VALUES ($name, $mail, $subject, $contact_message)";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();

// // Replace this with your own email address
// $siteOwnersEmail = 'amankedia1402@gmail.com';


// if($_POST) {

//    $name = trim(stripslashes($_POST['contactName']));
//    $email = trim(stripslashes($_POST['contactEmail']));
//    $subject = trim(stripslashes($_POST['contactSubject']));
//    $contact_message = trim(stripslashes($_POST['contactMessage']));

//    // Check Name
// 	if (strlen($name) < 2) {
// 		$error['name'] = "Please enter your name.";
// 	}
// 	// Check Email
// 	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
// 		$error['email'] = "Please enter a valid email address.";
// 	}
// 	// Check Message
// 	if (strlen($contact_message) < 15) {
// 		$error['message'] = "Please enter your message. It should have at least 15 characters.";
// 	}
//    // Subject
// 	if ($subject == '') { $subject = "Contact Form Submission"; }


//    // Set Message
//    $message .= "Email from: " . $name . "<br />";
//    $message .= "Email address: " . $email . "<br />";
//    $message .= "Message: <br />";
//    $message .= $contact_message;
//    $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

//    // Set From: header
//    $from =  $name . " <" . $email . ">";

//    // Email Headers
// 	$headers = "From: " . $from . "\r\n";
// 	$headers .= "Reply-To: ". $email . "\r\n";
//  	$headers .= "MIME-Version: 1.0\r\n";
// 	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


//    if (!$error) {

//       ini_set("sendmail_from", $siteOwnersEmail); // for windows server
//       $mail = mail($siteOwnersEmail, $subject, $message, $headers);

// 		if ($mail) { echo "OK"; }
//       else { echo "Something went wrong. Please try again."; }
		
// 	} # end if - no validation error

// 	else {

// 		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
// 		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
// 		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
// 		echo $response;

// 	} # end if - there was a validation error

// }

?>