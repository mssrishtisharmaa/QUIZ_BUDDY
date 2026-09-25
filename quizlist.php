<html>
<link rel="stylesheet" href="style.css">

<?php require ("header.php");?>

<?php
session_start();
require_once 'sql.php';
                $conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
} else {
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

    <div class="flex-grow-1">
	
  <section class="section section-shaped section-lg">
 


<div class="container"> 
      

<div class="row">
            <div class="col-sm-12 mb-3">  
            <div class="card card-body bg-gradient-white text-white mt-3" style="max-height: 400px; overflow-y: auto; ">
			   <div class="col-12 mx-auto text-center">
            <span class="badge badge-warning badge-pill mb-3">Quiz List</span>
          </div>
		  
          <div class="table-responsive">
		      <table id="tabledata" class=" table table-striped table-hover table-bordered  text-center ">

            <thead class="font-weight-bold">
                      <tr >

                <td >Quiz ID</td>
                <td> Quiz Title </td>
                <td> Created On </td>
                <td>  View </td>

				<td> Delete </td>
				        </tr>

            </thead>

		<tbody >
		
		
		  				        <?php


  $sql ="select * from quiz where staffid='{$staffid}'";
            $res=mysqli_query($conn,$sql);
       
while ($row = mysqli_fetch_array($res)) {                
             
			$id=$row['quizid'];
			$name=$row['quizname'];
			$date=$row['date_created'];
			
        ?>
		
			     <tr class="text-center">
              
                <td data-label="Quiz ID"> <?php echo $id ?> </td>
                <td data-label="Quiz Title"> <?php echo $name  ?> </td>
                <td data-label="Created On"> <?php echo $date  ?> </td>
                
        <td data-label="Profile"> <button class="btn btn-info btn-sm btn-block" > <a href="viewq.php?qid=<?php echo $id ?>" class="nav-link text-white"> View </a> </button> </td>
	
       <td data-label="delete"> <button class="btn btn-sm btn-danger btn-block" > <a href="delete.php?id=<?php echo $id ?>"  class=" nav-link text-white" data-toggle="tooltip">Delete</a> </button> </td>

            </tr>

							<?php
					
					
					}
				?>
			</tbody>
			
    </table>
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

<footer class="footer" style='background-color: #6b21a8;'>
  <div class="footer-container">
    <div class="footer-text">
      Quiz Buddy © 2026 <span>All Rights Reserved</span>
    </div>
    <div class="footer-links">
    <a href="" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Privacy Policy</a>
<a href="" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Terms of Use</a>
<a href="contact.php" class="text-white text-decoration-none" onmouseover="this.classList.replace('text-white','text-warning')" onmouseout="this.classList.replace('text-warning','text-white')">| Contact</a>


    </div>
  </div>
</footer>

</body>

</html>