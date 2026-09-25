<html>
<link rel="stylesheet" href="style.css">
<?php require ("header.php");?>

<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
require_once 'sql.php';
                $conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
}
?>
     
<?php
        $staffid = $_SESSION["staffid"];
    $sql = "select * from staff where staffid='{$staffid}'";
    $res =   mysqli_query($conn, $sql);
    if ($res == true) {
        global $dbstaffid, $dbpw;
        while ($row = mysqli_fetch_array($res)) {
            $dbstaffid = $row['staffid'];
            $dbname = $row['name'];
			$dbmail = $row['mail'];
            $dbphno = $row['phno'];
            $dbgender = $row['gender'];
            $dbdob = $row['DOB'];
            $dbdept = $row['dept'];
        }
    }
?>

<body style="background: #5F4B8B;" class="d-flex flex-column min-vh-100" id="top">
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
              <a href="homestaff.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-home"></i> DashBoard</span
                >
              </a>
            </li>
			
			 <li class="nav-item">
              <a href="quizlist.php" class="nav-link">
                <span class="text-success nav-link-inner--text font-weight-bold"
                  ><i class="text-success fad fa-poll"></i> QuizList</span
                >
              </a>
            </li>
			
			 <li class="nav-item">
              <a href="staffleaderboard.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-award"></i> LeaderBoard</span
                >
              </a>
            </li>
			
			
			 <li class="nav-item">
              <a href="staffprofile.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fas fa-user-circle"></i> <?php echo $dbname ?></span
                >
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
    
<main class="flex-grow-1">
  <section class="section section-lg py-5">
    <div class="container  ">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow-lg">
            <div class="card-header bg-gradient-primary text-white text-center">
              <h4>Quiz Questions</h4>
            </div>
            <div class="card-body " style="max-height: 400px; overflow-y: auto;">


<?php 
if (isset($_GET["qid"])) {
    $qid = $_GET["qid"];
    $sql = "SELECT * FROM questions WHERE quizid='{$qid}'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        if (mysqli_num_rows($res) == 0) {
            echo '<div class="alert alert-warning text-center">No questions found under this quiz. Please add questions.</div>';
            echo '<form method="POST" class="text-center">';
            echo '<button type="submit" name="submit" class="btn btn-success mt-3">Add Questions</button>';
            echo '</form>';
        } else {
            echo '<form method="POST">';
            echo '<div class="text-right mb-3">';
            echo '<button type="submit" name="submit" class="btn btn-success">Add More Questions</button>';
            echo '</div>';

            $i = 1;
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<div class="card mb-4 border-primary">';
                echo '<div class="card-body">';
                echo "<h5 class='card-title'>Q{$i}: {$row['qs']}</h5>";

                echo '<div class="form-check">
                        <input class="form-check-input" type="radio" name="ans'.$i.'" value="0" id="q'.$i.'_1">
                        <label class="form-check-label" for="q'.$i.'_1">'.$row['op1'].'</label>
                      </div>';
                echo '<div class="form-check">
                        <input class="form-check-input" type="radio" name="ans'.$i.'" value="1" id="q'.$i.'_2">
                        <label class="form-check-label" for="q'.$i.'_2">'.$row['op2'].'</label>
                      </div>';
                echo '<div class="form-check">
                        <input class="form-check-input" type="radio" name="ans'.$i.'" value="2" id="q'.$i.'_3">
                        <label class="form-check-label" for="q'.$i.'_3">'.$row['op3'].'</label>
                      </div>';
                echo '<div class="form-check">
                        <input class="form-check-input" type="radio" name="ans'.$i.'" value="3" id="q'.$i.'_4">
                        <label class="form-check-label" for="q'.$i.'_4">'.$row['answer'].'</label>
                      </div>';

                echo '</div></div>';
                $i++;
            }
            echo '</form>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Error loading questions: ' . mysqli_error($conn) . '</div>';
    }

    if (isset($_POST["submit"])) {
        echo "<script>window.location.replace('addq.php?qid={$qid}')</script>";
    }
}
?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
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