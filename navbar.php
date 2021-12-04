<head>
  <style>
        /*for Nav Bar*/
.topic{
  font-size: 20px;
  font-family: calibri;
}
   
  .login_Button{
          background-color: rgb(45, 175, 49); /* Green */
          border: none;
          color: white;
          padding: 2px 12px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 17px;
          font-family: calibri;
          cursor: pointer;
          border-radius: 5px;
          
  
  }
  .login_Button:hover {
      background-color: lightgreen;
      color:black;
  }

 
  .navbar {
    background-color: rgba(29, 37, 39, 0.808);
    z-index: 2;
    }
    .dropdown:hover .dropdown-content {display: block;}
    .dropdown-content a:hover {background-color:#008080;}


/* nav end */
    </style>




  </head>


<body>



<nav class="container-fluid navbar sticky-top navbar-expand-md navbar-dark py-md-1  ">
    
        <a class="navbar-brand topic" href="index.php"><img src="img/logo.png" width="25" height="25" class="d-inline-block align-center" />Private Medical Center-Kalutara</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      
      <li class=" nav-item">
        <a class="nav-link" href="index.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="OurDoctors.php">OUR DOCTORS</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SERVICES
        </a>
        <div class="dropdown-menu bg-dark dropdown-content" aria-labelledby="navbarDropdown">
        <a class="dropdown-item " style="color:white;" href="calendar.php">Doctor Channeling</a>
          <a class="dropdown-item" style="color:white;" href="#">Action</a>
          <a class="dropdown-item" style="color:white;" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="color:white;" href="#">Something else here</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="about.php">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">CONTACT US</a>
      </li>  
      <!-- <li class="nav-item">
        <a class="nav-link" href="signin.php">
            <button type="button" class="login_Button" data-toggle="tooltip" data-placement="bottom" title="Sign In/Sign Up">Sign In
            </button></a>
      </li>   -->
  
      <?php if (isset($_SESSION['aa'])) : ?>
			<div class="error aa" >
					
            
          <li class="nav-item noDisplay" style="display:<?php echo $_SESSION['aa']; ?>;">
            <a class="nav-link" href="adminPannel.php">ADMIN PANEL</a>
            </li>
					

			</div>
    <?php endif ?>

    <?php if (isset($_SESSION['dd'])) : ?>
			<div class="error dd" >
					
            
          <li class="nav-item noDisplay" style="display:<?php echo $_SESSION['dd']; ?>;">
            <a class="nav-link" href="patientForEachDay.php">DOCTOR PANEL</a>
            </li>
					

			</div>
    <?php endif ?>

    <?php if (isset($_SESSION['cc'])) : ?>
			<div class="error cc" >
					
            
          <li class="nav-item noDisplay" style="display:<?php echo $_SESSION['cc']; ?>;">
            <a class="nav-link" href="cashier.php">CASHIER PANEL</a>
            </li>
					

			</div>
    <?php endif ?>

    <?php if (isset($_SESSION['pp'])) : ?>
			<div class="error pp" >
					
            
          <li class="nav-item noDisplay" style="display:<?php echo $_SESSION['pp']; ?>;">
            <a class="nav-link" href="pharmacist.php">PHARMACIST PANEL</a>
            </li>
					

			</div>
    <?php endif ?>

    

    <!--NAV BAR LOGIN AND SIGNUP BUTTONS-->
    
    <li >
                <?php  if (isset($_SESSION['user'])) {?>
            		    <label style="margin-right:5px; color:white;margin-top:7px;margin-left:4px;" data-toggle="dropdown"><?php echo $_SESSION['user']['fname']; ?></label>
                    </li> 
                    <li>                             
                    <div class="dropdown" Style="margin-top:9px;">
                      <i class="dropdown-toggle" style="color:white;margin-left:4px;"data-toggle="dropdown"></i>
                        
                      <div class="dropdown-menu dropdown-menu-right" style="margin-right:0px;">
                        <a class="dropdown-item" href="userProfile.php" style="color: black;">My Profile</a>
                        <a class="dropdown-item" href="index.php?logout='1'" style="color: red;" name>logout</a>
                      </div>
                    </div>
            
                <?php }else{ ?>
                  <button Style="margin-right:5px; color:white;margin-top:7px;margin-left:4px;" onclick="window.location.href = 'signin.php';" class="login_Button" type="button" id="nav_login_btn" title="Sign In/Sign Up">Sign In</button>
                <?php } ?>
                </li> 
                </ul> 
  </div>  

</nav>



</body>