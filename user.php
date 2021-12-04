<php? 
$fname = $_POST['fname'];
  
  $email       =  e($_POST['email']);
 $username = $_POST['username'];
  $subject="User Account created Successfully";
  // Content-Type helps email client to parse file as HTML 
  // therefore retaining styles
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $message = "<html>
  <head>
  	<title>New message from website contact form</title>
  </head>
  <body>
        <h4 style='color:darkblue;font-family:calibri;font-size:15px;'> ***Your Account in Private Medical Center Kalutara is Successfully Created*** </h4>
        <p style='color:darkblue;font-family:calibri;font-size:20px'>Your Username is: '$username'</p>
        <p>Your account is created for '$email' email and you can't use it again to register with us-</p>
        <h5 style='color:red;font-family:calibri;font-size:15px;'> *****Don't forget your Username and Password***** </h5>
        <h5 style='color:black;font-family:calibri;font-size:12px;'> +9434 222 1363 Call us for if you have any problems or inquiries</h5>
        
        </body>
        </html>";


        if (!empty($_POST["email"])) {
          $email = test_input($_POST["email"]);
		        // check if e-mail address is well-formed
		        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              mail($email, $subject, $message, $headers);
               $_SESSION['signup']  = "Your Details send to your Email.<br>Please do not forget your credentials";
                }
                
  }
  ?>