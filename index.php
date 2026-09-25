<?php session_start(); ?>
<html>
<head>
<title>Quiz Buddy</title>
  <meta name="viewport" content="width=device-width, initial-scale=.0">
  <link href="style.css"  rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
 

</head>
<?php require ("header.php");?>

  <body class="bg-white" id="top">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-default navbar-light position-sticky top-0 py-0">
    <div class="container-fluid">
        
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <li class="nav-item dropdown">
            <a href="index.php" class="navbar-brand mr-lg-5 text-white">
                               <img src="assets/img/quizbuddy_image.png"style="width: 13rem; height: 60px;" />
                               <img src="assets/img/quizbuddy_image2.png"style="width: 13rem; height: 60px;" />
            </a>
          </li>
        </ul>

        <button
          class="navbar-toggler bg-white"
          type="button"
          data-toggle="collapse"
          data-target="#navbar_global"
          aria-controls="navbar_global"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="navbar-collapse collapse bg-default" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-10 collapse-brand">
                <a href="index.html">
                <img src="assets/img/quizbuddy_image.png"style="width: 8rem; height: 60px;" />
                <img src="assets/img/quizbuddy_image2.png"style="width: 8rem; height: 60px;" />
                </a>
              </div>
              <div class="col-2 collapse-close bg-danger">
                <button
                  type="button"
                  class="navbar-toggler"
                  data-toggle="collapse"
                  data-target="#navbar_global"
                  aria-controls="navbar_global"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav align-items-lg-center ml-auto">
		  
		   <li class="nav-item">
              <a href="contact.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-address-card"></i> Contact</span
                >
              </a>
            </li>
            <li class="nav-item">
			   <div class="dropdown show ">
		  <a class="nav-link dropdown-toggle text-white " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-sign-in-alt"></i> Login</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="loginstud.php ">Student</a>
			<a class="dropdown-item" href="login.php">Staff</a>
		  </div>
		</div>
			</li>
			
           <li class="nav-item">
              <a href="signup.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-user-plus"></i> Sign Up</span
                >
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- End Navbar -->
  
    <div class="wrapper">
      <div class="page-header">
        <div class="page-header-image" style="background-image: url('assets/img/homepage_bg.png');"></div>

        <div class="container shape-container d-flex align-items-center py-lg">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <div class="container_welcome">
                  <h1 class="text-white display-1">Welcome</h1>
                </div>
                <h2 class="display-4 font-weight-weigthed text" style= "padding-top: 1.5rem">Click Below</h2>
                <div class="btn-wrapper mt-4">
                  <a href="signup.php" class="btn btn-warning btn-icon mt-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                    <span class="btn-inner--text">Sign Up</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	
      <div class="section features-6 text-dark bg-white" id="services">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <span class="badge badge-primary badge-pill mb-3">Insight</span>
                <h3 class="display-3">Features</h3>
            </div>
          </div>
          <div class="row align-items-center">
  <div class="col-lg-6">
    <div class="info info-horizontal info-hover-primary">
      <div class="description pl-4">
      <h3 class="title">For Students</h3>
        <p class=" ">Experience a seamless and user-friendly quiz-taking platform. Register now and enjoy the convenience of completing quizzes at your own pace, anytime and anywhere.</p>
      </div>
    </div>
    <div class="info info-horizontal info-hover-danger mt-5">
      <div class="description pl-4">
        <h3>For Teachers</h3>
        <p class=" ">Empower your teaching with the ability to create and manage quizzes online effortlessly. Engage students with a hassle-free quiz experience.</p>
      </div>
    </div>
  </div>


            <div class="col-lg-6 col-10 mx-md-auto d-none d-md-block">
              <img class="ml-lg-5 img-fluid" src="assets/img/pic1.png">
            </div>
          </div>
        </div>
      </div>
      <div class="section features-6 text-dark bg-white" id="tech">
        <div class="container-fluid shado">
          <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <span class="badge badge-primary badge-pill mb-3">stack</span>
                <h3 class="display-3">Technologies Used</h3>
                <p>Our Development Stack</p>
            </div>
          </div>

          <div class="row text-lg-center align-self-center">
            <div class="col-md-4">
              <div class="info">
                <img class="img-fluid" src="assets/img/html.png" alt="HTML5">                       
                <h6 class="info-title text-uppercase text-primary">HTML5</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <img class="img-fluid" src="assets/img/css3.png" alt="CSS3">                       
                <h6 class="info-title text-uppercase text-primary">CSS3</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <img class="img-fluid" src="assets/img/js.png" alt="JavaScript">                       
                <h6 class="info-title text-uppercase text-primary">JavaScript</h6>
              </div>
            </div>
          </div>

          <div class="row text-center">            
          <div class="col-md-4 col-12">

              <div class="info">
                <img class="img" src="assets/img/bootstrap.png" alt="BootStrap4">                       
                <h6 class="info-title text-uppercase text-primary">BootStrap4</h6>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="info">
                <img class="img" src="assets/img/apache.png" alt="Apache">                       
                <h6 class="info-title text-uppercase text-primary">Apache</h6>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="info">
                <img class="img" src="assets/img/mysql.png" alt="MySQL">                       
                <h6 class="info-title text-uppercase text-primary">MySQL</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

<div id="hide-footer" style="display: none;">
  <?php require("footer.php"); ?>
</div>

<footer class="footer" style='background-color: #6b21a8;'>
  <div class="footer-container">
    <div class="footer-text">
      Quiz Buddy © 2026 <span>All Rights Reserved</span>
    </div>
    <div class="footer-links">
    <a href="" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Privacy Policy</a>
<a href="" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Terms of Use</a>
<a href=" contact.php" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Contact</a>

    </div>
  </div>
</footer>

  </body>
</html>
