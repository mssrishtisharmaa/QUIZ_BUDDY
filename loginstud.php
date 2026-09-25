<?php session_start(); ?>
<html>

<link rel="stylesheet" href="style.css">
<?php require ("header.php");?>



<?php
        if (isset($_POST['login'])) {
            if (  isset($_POST['usn']) && isset($_POST['pass'])) {        require_once 'sql.php';
                $conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
                    echo "<script>alert(\"Database error retry after some time !\")</script>";
                }
                $usn = mysqli_real_escape_string($conn, $_POST['usn']);
                $password = mysqli_real_escape_string($conn, $_POST['pass']);
                $sql = "select * from student where usn='{$usn}'";
                $res =   mysqli_query($conn, $sql);
                if ($res == true) {
                    global $dbusn, $dbpw;
                    while ($row = mysqli_fetch_array($res)) {
                        $dbpw = $row['pw'];
                        $dbusn = $row['usn'];
                        $_SESSION["name"] = $row['name'];
                        $_SESSION["usn"] = $dbusn;
                    }
                    if ($dbpw === $password) {
                            header("Location: homestud.php");
                        }
                     else  {
                        echo "<script>alert('username or password is wrong');</script>";
                    } 
                }
            }
        }
?>

<body style="background:#5F4B8B url('assets/img/bg_studlogin.png') repeat center; background-size: 65% auto; height: 100vh; width: 100%; min-height: 100%; display: flex; flex-direction: column;">




<div class="page-container" style="flex: 1 0 auto;">

    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="
        navbar navbar-main navbar-expand-lg
        bg-default
        navbar-light
        position-sticky
        top-0
        shadow
        py-0
      "
    >
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
                <img src="assets/img/quizbuddy_image.png"style="width: 13rem; height: 60px;" />
                <img src="assets/img/quizbuddy_image2.png"style="width: 13rem; height: 60px;" />
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
			<a class="dropdown-item" href="loginstud.php">Student</a>
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
  
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-6 ">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

<div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-success badge-pill mb-3">Student login </span>
          </div>
        </div>
		
<div class="row row-content align-text-center text-white ">
	<div class="col-12 offset-sm-2 col-sm-8 offset-sm-2 ">



<div class="col-12  ">

<div class="row justify-content-center"> 
  <div class="col-sm-8 col-md-6 col-lg-4"> <!-- Setting max width for the form container -->
    <div class="card card-body" style="background: rgba(0, 0, 0, 0.3);">

      <form method="POST" autocomplete="new-password">
        <div class="form-group">
          <label for="usn" class="form-label text-white">USN</label>
          <input type="text" class="form-control text-dark" id="usn" name="usn" placeholder="USN" autocomplete="new-password" />
        </div>

        <div class="form-group">
          <label for="pass" class="form-label text-white">Password</label>
          <input type="password" class="form-control text-dark" id="pass" name="pass" placeholder="********" autocomplete="new-password" />
        </div>

        <div class="form-group text-center">
          <button type="submit" class="btn btn-success w-100" name="login" value="login">Login</button>
        </div>
        <div class="form-group text-center mt-3 ">
    <a href="signup.php" class="text-white medium " style="text-decoration: underline;">
      Don't have an account? <br>Sign up
    </a>
  </div>
      </form>

    </div>
  </div>
</div>


                </div>
            </div>
			</div>
</div>
</section>
</div>
	
<div id="hide-footer" style="display: none;">
  <?php require("footer.php"); ?>
</div>
</div>

<footer class="footer" style="background-color: #6b21a8;">
  <div class="footer-container">
    <div class="footer-text">
      Quiz Buddy © 2026 <span>All Rights Reserved</span>
    </div>
    <div class="footer-links">
    <a href="#" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Privacy Policy</a>
<a href="#" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Terms of Use</a>
<a href="contact.php" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Contact</a>


    </div>
  </div>
</footer>

</body>

</html>