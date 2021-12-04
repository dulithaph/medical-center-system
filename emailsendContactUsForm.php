<?php
//For Contact us Submit Form 
if (isset($_POST['send_message_btn'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $msg = $_POST['msg'];
  // Content-Type helps email client to parse file as HTML 
  // therefore retaining styles
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $message = "<html>
  <head>
  	<title>New message from website contact form</title>
  </head>
  <body>
    
  	<h1>" . $subject . "</h1>
      <p>".$msg."</p>
      <p>From: ".$email."</p>
  </body>
  </html>";
 
  if (mail('medicalcenterkalutara@gmail.com', $subject, $message, $headers)) {
    
    $_SESSION['mail']  = "Your message has been sent Successfully!";
   }else{
    $_SESSION['mail']  = "your message has not been sent successfully!";
   }
 }

 ?>