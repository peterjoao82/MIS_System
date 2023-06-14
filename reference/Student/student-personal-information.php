 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<?php 

    $roll_no=$_SESSION['LoginStudent'];

	if (isset($_POST['sub'])) {

		$first_name=$_POST['first_name'];

		$course_code=$_POST['course_code'];

		$section=$_POST['section'];

		$batch=$_POST['batch'];

		$fac_adv=$_POST['fac_adv'];

		$semester=$_POST['semester'];

		$query="update student_info set first_name='$first_name',semester='$semester',course_code='$course_code',section='$section',batch='$batch',fac_adv='$fac_adv' where roll_no='$roll_no'";
		$run=mysqli_query($con,$query);
		if ($run) {  ?>
 			<script type="text/javascript">
 				alert("Student data has been updated");
 			</script>
 		<?php }
 		else { ?>
 			<script type="text/javascript">
 				alert("Student data has not been updated due to some errors");
 			</script>
 		<?php }


	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Student Personal Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main sub-main-student">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Your Personal Information </h4>
				</div>
				<div class="row ml-4">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form action="student-personal-information.php" method="post">
							<?php $roll_no=$_SESSION['LoginStudent'];
								$query="select * from student_info where roll_no='$roll_no'";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {?>
							<div class="row">
								<div class=" col-lg-6 col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">First Name:*</label>
										<input type="text" class="form-control" name="first_name" value=<?php echo $row['first_name']?> readonly>
									</div>
								</div>
								
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Course code:*</label>
										<input type="text" class="form-control" name="course_code"  value="<?php echo $row['course_code'] ?>" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Section:*</label>
										<input type="text" class="form-control" name="section" value=<?php echo $row['section'] ?> readonly>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Batch:*</label>
										<input type="text" class="form-control" name="batch"  value=<?php echo $row['batch'] ?> readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Faculty Advisor:*</label>
										<input type="text" class="form-control" name="fac_adv" value=<?php echo $row['fac_adv'] ?> readonly>
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputPassword1">Semester</label>
										<input type="number" name="semester" class="form-control"  placeholder="Semester" value=<?php echo $row['semester'] ?> readonly>
									</div>
								</div>
							</div>
							<?php } ?>
						</form>
					</div>
				</div>	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
								