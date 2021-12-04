<?php include('signinFunctions.php'); ?>
<?php
if(isset($_GET['vkey'])){
    //process verfication
    $vkey=$_GET['vkey'];
    
    $VerifyQuery1="select verified,vkey from users WHERE verified=0 AND vkey='$vkey' LIMIT 1 ";
    $verify_resultset1 = mysqli_query($db,$VerifyQuery1);
 
    if(mysqli_num_rows($verify_resultset1) == 1){

        $VerifyQuery2 = "update users set verified = 1 where vkey = '$vkey' limit 1";
        $verify_resultset2 = mysqli_query($db,$VerifyQuery2);
        if($verify_resultset2){
			// echo "Your account has been verified.You may now log in.";
			$_SESSION['success']  = "Your account has been verified.You may now Sign In";
        }
        else{
			// echo "Not updated.Some error occured.";
			$_SESSION['success']  = "Not updated.Some error occured";
        }
    }
    else{
		$_SESSION['success']  = "this account invalid or already verified";
// echo "this account invalid or already verified";
    }



      
}else{
    // $_SESSION['success']  = "Account is not Created Please Try Again";
}



?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/logo.png" />
	<title>Login|Private Medical Center-Kalutara</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


 <!--Custom styles-->
<link rel="stylesheet" type="text/css" href="signin.css">
<link rel="stylesheet" type="text/css" href="footer.css">
	
<!--for nav bar-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Animate css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   
</head>
<body>






<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" style="text-align: center;">
				<nav style="background-color:black;color:white;">
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</nav>
			</div>
    <?php endif ?>
<?php include('navbar.php') ?>

         

 


<div class="container-fluid">
	<div class="d-flex justify-content-center h-100">
		<div class="card animated pulse delay-0s">
		<div class="card-header">
			<h3 Style="padding: 0px; margin: 0px;line-height: 100%">Sign In</h3>
			
			<div class="card-body">
				<form method="post" action="signin.php"> 
            
				<h5 style="color:red;padding:0px;margin:0px;font-family:calibri;font-size:17px"> <?php echo display_error(); ?>

            <?php if (isset($_SESSION['msg'])) : ?>
			          <div class="error msg" style="text-align: center;">
					  <?php 
						    echo $_SESSION['msg']; 
						    unset($_SESSION['msg']);
					  ?>
                </div>
            <?php endif ?>

          </h5>
			
			
			</div>
       

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
						</div>
						
						<input type="text" class="form-control" placeholder="username"  name="username" value="<?php echo $username; ?>">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password"  name="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group" class="login_btn">
						<button type="submit"  class="login_btn btn float-right" name="login_btn">Sign In</button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					<h6>Don't have an account?
					<a class ="links" href="signup.php">Sign Up</a></h6>
				</div>
				<div class="d-flex justify-content-center">
          <button id="myBtn"   class="buttonForget">Forgot your password?</button>
          


					







				</div>
			</div>
		</div>
		</div>
	</div>
</div>



<!-- The Modal password Reset -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  
  <div class="modal-content  ">
    <span class="close">&times;</span>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>

            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                 
            </div>
          </div>
	</div>
</div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



<?php include 'footer.php';?>
</body>
</html>
