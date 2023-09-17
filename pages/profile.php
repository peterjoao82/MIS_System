
<?php
session_start();
if (!$_SESSION["user_id"]) {
  header('location: ../login/login.php');
}
require_once "../connection/connection.php";
?>
<!DOCTYPE html>

<html lang="en">
<?php include('../include/header.php');
?>

<style>
  #btm1 {
    text-decoration: underline;
  }
</style>
<body class="g-sidenav-show bg-gray-100">

  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
          
 <?php include('../include/dashboardnav.php'); ?><br><br><br><br><br><br>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <br>
          <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
           <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/smv.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-4"></span>
      </div>
      <!-- Yes -->
      <div class="card card-body blur shadow-blur mx-4 mt-n6  overflow-hidden">
        <div class="row gx-4">
         
				<div class="row ml-4">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form action="profile.php" method="post">
							<?php $user_id=$_SESSION['user_id'];
								$query="SELECT DISTINCT sm.ST_NO as USN, sm.FNAME as Fname,sm.BR_CODE as bcode,sm.MOBILE_NO as mb,e.FNAME as ename,sm.StCollegeEMail as email, PASSWD as pass FROM studentmaster sm, employee e WHERE sm.ST_NO='$user_id' and sm.FAC_ADVISOR = e.EMP_NO";
								$run=mysqli_query($conn,$query);
								while ($row=mysqli_fetch_array($run)) {?>
							<div class="row">					
              					<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Name</label>
										<input type="text" class="form-control" name="course_code"  value="<?php echo $row['Fname'] ?>" readonly>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">USN</label>
										<input type="text" class="form-control" name="course_code"  value="<?php echo $row['USN'] ?>" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Branch:</label>
										<input type="text" class="form-control" name="section" value=<?php echo $row['bcode'] ?> readonly>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Mobile Number:</label>
										<input type="text" class="form-control" name="batch"  value=<?php echo $row['mb'] ?> readonly>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Email</label>
										<input type="text" name="semester" class="form-control"  placeholder="Semester" value=<?php echo $row['email'] ?> readonly>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">faculty Adivsor Name</label>
										<input type="text" class="form-control" name="course_code"  value="<?php echo $row['ename'] ?>" readonly>
									</div>
								</div>
               
							</div>
							<?php } ?>
						</form>
            <p>Any Suggestions? <br> <a id="btm1" href="https://contact.oneshorts.in/"> Contact us.</a></p>
					</div>
				</div>	
              
       
    </div>
  </div>
  <?php include('../include/footer.html'); ?>

</body>

</html>