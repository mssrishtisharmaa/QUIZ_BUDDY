<html>
<link rel="stylesheet" href="style.css">

<?php require ("header.php");?>
<?php
session_start();
require_once 'sql.php';
                $conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
} else {
    $usn = $_SESSION["usn"];
    $sql = "select * from student where usn='{$usn}'";
    $res =   mysqli_query($conn, $sql);
    if ($res == true) {
        global $dbusn, $dbpw;
        while ($row = mysqli_fetch_array($res)) {
            $dbusn = $row['usn'];
            $dbname = $row['name'];
			$dbmail = $row['mail'];
            $dbphno = $row['phno'];
            $dbgender = $row['gender'];
            $dbdob = $row['DOB'];
            $dbdept = $row['dept'];
        }
    }
}
?>


<body class="bg-white" class="d-flex flex-column min-vh-100" id="top">
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
              <a href="homestud.php" class="nav-link text-success">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-home"></i> DashBoard</span
                >
              </a>
            </li>
			
            <li class="nav-item">
  <a href="studscorecard.php" class="nav-link">
    <span class="text-success nav-link-inner--text font-weight-bold">
      <i class="fad fa-poll"></i> ScoreCard
    </span>
  </a>
</li>

<li class="nav-item">
  <a href="studleaderboard.php" class="nav-link">
    <span class="text-white nav-link-inner--text font-weight-bold">
      <i class="fad fa-award"></i> LeaderBoard
    </span>
  </a>
</li>

<li class="nav-item">
  <a href="studprofile.php" class="nav-link">
    <span class="text-white nav-link-inner--text font-weight-bold">
      <i class="fas fa-user-circle"></i> <?php echo $dbname ?>
    </span>
  </a>
</li>

<li class="nav-item">
  <a href="logout.php" class="nav-logout-link">
    <span class="text-white  nav-link-inner--textlogout font-weight-bold">
      <i class="text-danger fas fa-power-off"></i> Logout
    </span>
  </a>
</li>

		  

          
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="flex-grow-1">
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
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


<div class="container  ">
  
		<div class="row">
            <div class="col-sm-12 mb-3">  
            <div class="card card-body bg-gradient-white text-white mt-3" style="max-height: 400px; overflow-y: auto; ">
			   <div class="col-12 mx-auto text-center">
            <span class="badge badge-default badge-pill mb-3">Score Card</span>
          </div>
			  <?php 
            $sql ="select * from score,quiz where score.usn='{$usn}' and score.quizid=quiz.quizid";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                echo "<table id=\"sc\" class=\" table table-striped table-hover table-bordered text-center text-primary\">
				<thead >
				<tr>
				<td>Quiz Title</td>
				<td>Score Obtained</td>
				<td>Total Questions</td>
				<td>Remarks</td>
				</tr>
				</thead>";
                while ($row = mysqli_fetch_assoc($res)) {                
                    echo "<tr  class=\" text-center text-dark\"><td>".$row["quizname"]."</td><td>".$row["score"]."</td><td>".$row["totalscore"]."</td><td>".$row["remark"]."</tr>"; 
                }
                echo "</table>";
            }
            else{
                echo " ".mysqli_error($conn);
            }
            ?>
         
              </div>
       </div>
    </div>	

	

        </div>
</section>


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
<a href="" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Contact</a>


    </div>
  </div>
</footer>

</body>

</html>