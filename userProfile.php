<?php
include('signinFunctions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: signin.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/logo.png" />
<title>User Profile-Private Medical Center-Kalutara</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
      
<!--for nav bar-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   
<!--Custom styles-->
<link rel="stylesheet" type="text/css" href="userProfile.css">
<link rel="stylesheet" type="text/css" href="footer.css">
   




</head>
<body>
<?php include('navbar.php') ?>
<br><br><h5 style="color:red;padding:0px;margin:0px;font-family:calibri;font-size:19px"> <?php echo display_error(); ?>
<?php if (isset($_SESSION['resetErr'])) : ?>
			<div class="error resetErr" style="text-align: center;">
				<nav style="background-color:black;color:white;">
					<?php 
						echo $_SESSION['resetErr']; 
						unset($_SESSION['resetErr']);
					?>
				</nav>
			</div>
    <?php endif ?>




<?php if (isset($_SESSION['updateErr'])) : ?>
  <div class="error msg" style="text-align: center;">
      <?php 
        echo $_SESSION['updateErr']; 
    unset($_SESSION['updateErr']);
          ?>
</div>
<?php endif ?>


</h5>

<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
               
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Update Details</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#password" data-toggle="tab" class="nav-link">Password Reset</a>
                </li>
            </ul>

            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h4 class="mb-3" Style="font-family:Bebas Neue Bold;font-size:38px;">Welcome to your Profile Mr. <?php echo $_SESSION['user']['fname']; ?></h4>
                    <h5 class="mb-3">♦♦♦♦ Personal Details ♦♦♦♦</h5>

                    <div class="row" >
                        <div class="col-md-8" Style="align-content:center;">
                        <ul>
                         <li>   <h6 Style="font-family:calibri;font-size:23px;">Account Type - <?php echo $_SESSION['user']['user_type']; ?></h6></li>
                         <li>   <h6 Style="font-family:calibri;font-size:23px;">Name - <?php echo $_SESSION['user']['fname']; ?> <?php echo $_SESSION['user']['lname']; ?></h6></li>
                         <li>   <h6 Style="font-family:calibri;font-size:23px;">Date of Birth - <?php echo $_SESSION['user']['dob']; ?></h6></li>
                         <li>   <h6 Style="font-family:calibri;font-size:23px;">Contact Number - <?php echo $_SESSION['user']['contactNo']; ?></h6></li>
                         <li>   <h6 Style="font-family:calibri;font-size:23px;">Gender - <?php echo $_SESSION['user']['gender']; ?></h6></li>
                         <li>   <h6 Style="font-family:calibri;font-size:23px;">E-mail - <?php echo $_SESSION['user']['email']; ?></h6></li>
                         <li>   <h6 Style="font-family:calibri;font-size:23px;">Username - <?php echo $_SESSION['user']['username']; ?></h6></li>
                        </div>
                      
                        
                    </div>
                    <!--/row-->
                </div>
                
                <div class="tab-pane" id="edit">
                <form method="post" action="userProfile.php"> 
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="fname" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Date of Birth</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="age">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Contact Number</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="contactNo">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <!-- <input type="reset" class="btn btn-secondary" value="Cancel"> -->
                                <button type="submit"  class="btn btn-primary" name="updateBtn">Update Changes</button>
                                
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="password">
                <form method="post" action="userProfile.php"> 
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label form-control-label">New Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password_1" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label form-control-label">Confirm New Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password_2">
                            </div>
                        </div>
                       
                       
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <button type="submit"  class="btn btn-primary" name="passwordReset">Reset Password</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
                

            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="img/user.jpg" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="file" class="custom-file-input">
                <span class="custom-file-control">Choose file</span>
            </label>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
</body>
</html>