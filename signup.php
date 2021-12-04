<?php
include('signinFunctions.php');
include('emailsendWhenSignUp.php');

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/logo.png" />
	<title>Login|Private Medical Center-Kalutara</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!--Custom styles-->
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="footer.css">
<!--for nav bar-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Animate css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   
</head>

<body>

<?php include('navbar.php') ?>
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

	<?php if (isset($_SESSION['signup'])) : ?>
			<div class="error signup" style="text-align: center;">
				<nav style="background-color:black;color:white;">
					<?php 
						echo $_SESSION['signup']; 
						unset($_SESSION['signup']);
						
					?>
				</nav>
			</div>
    <?php endif ?>

<div class="container-fluid">
	<div class="d-flex justify-content-center h-100">
		<div class="card animated pulse" id="animateid1">
		<div class="card-header">
			<h3>Sign Up</h3>
			
			<div class="card-body">
      <form method="post" action="signup.php">

	  <h5 style="color:red;padding: 0px; margin: 0px;font-family:calibri;font-size:17px"> <?php echo display_error(); 
	 	?>
	  <br>
      </h5>


                <div class="input-group form-group">
						        <div class="input-group-prepend">
							          <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
						      </div>
						            <input type="text" class="form-control" placeholder="First Name"  name="fname">
                </div>
                    
                    
                <div class="input-group form-group">
						        <div class="input-group-prepend">
							          <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
						        </div>
						            <input type="text" class="form-control" placeholder="Last Name"  name="lname">
                </div>
                   
                <div class="input-group form-group">
						        <div class="input-group-prepend">
							          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
						        </div>
						            <!-- <input type="text" class="form-control" placeholder="Age" name="age" > -->
									<input type="text" placeholder="Date of Birth" class="form-control"   onfocus="(this.type='date')"  name="age" >
				</div>


                <div class="input-group form-group">
						        <div class="input-group-prepend">
							          <span class="input-group-text box1"><i class="fas fa-phone-square"></i></span>
						        </div>
						            <input type="text" class="form-control" placeholder="Contact Number"  name="contactNo" >
                </div>
                   
                   
                <div class="input-group form-group">
						        <div class="input-group-prepend">
							          <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                    </div>
					<div class="form-check-inline box1"> Gender:-  
							<input type="radio" name="gender" value="female"> Female 
  							<input type="radio" name="gender" value="male"> Male 
  							<input type="radio" name="gender" value="other"> Other   
							
                    </div>
                </div>
                   

                    
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
						</div>
						
                        <input type="text" class="form-control" placeholder="E-mail" name="email">
                    </div>

                <div class="input-group form-group">
						      <div class="input-group-prepend">
							      <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
						      </div>
						        <input type="text" class="form-control" placeholder="Username"  name="username">
                    
                </div>

                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Password"  name="password_1">
                    </div>

                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Confirm password"  name="password_2">
                    </div>

					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
          <button type="submit"  class="login_btn btn float-right" name="register_btn" onclick="clickFunc()">Sign up</button>
					</div>
				</form>
			</div><br>
		<div class="card-footer">
			<div class="d-flex justify-content-center links">
			<h6>Already have an account?
				<a class ="links" href="signin.php">Sign IN</a></h6>
			</div>
		</div>
		
		
		
		</div>
		</div>
	</div>
</div>
<script>
function clickFunc() {
   var element = document.getElementById("animateid1");
   element.classList.add("mystyle");
}
</script>


<?php include 'footer.php';?>
</body>
</html>