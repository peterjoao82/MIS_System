<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";
	?>
<!---------------- Session Ends form here ------------------------>

<?php  
 	if (isset($_POST['btn_save'])) {

		$roll_no= $_POST["roll_no"];

 		$first_name=$_POST["first_name"];

 		$course_code=$_POST['course_code'];

 		$password=$_POST['password'];

 		$role=$_POST['role'];
		
		$sem=$_POST['sem'];

		$section=$_POST['section'];

		$batch=$_POST['batch'];

		$fac_adv=$_POST['fac_adv'];

        $scheme=$_POST['scheme'];
 		
 		$query="Insert into student_info(roll_no,first_name,course_code,semester,section,batch,fac_adv,scheme)values('$roll_no','$first_name','$course_code','$sem','$section','$batch','$fac_adv','$scheme')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 		$query2="insert into login(user_id,Password,Role)values('$roll_no','$password','$role')";
 		$run2=mysqli_query($con, $query2);
 		if ($run2) {
 			echo "Your Data has been submitted into login";
 		}
 		else {
 			echo "Your Data has not been submitted into login";
 		}
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];


		$semester=$_POST['semester'];

		$roll_no=$_POST['roll_no'];

		$subject_code=$_POST['subject_code'];

		$date=date("d-m-y");

		$query3="insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('$course_code','$semester','$roll_no','$subject_code','$date')";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Student</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Student Management System </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button>
					</div>
				</div>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info text-white">
							        <h4 class="modal-title text-center">Add New Student</h4>
						        </div>
							    <div class="modal-body">
							        <form action="student.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">STUDENT USN:</label>
											        <input type="text" name="roll_no" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">STUDENT NAME:</label>
												    <input type="text" name="first_name" class="form-control">
											    </div>
											</div>
										
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>COURSE CODE:</label>
												    <input type="text" name="course_code" class="form-control">
											    </div>
											</div>
                                 <div class="row">
											<div class="col-md-4">
												<div class="form-group">
												 <label for="exampleInputPassword1">SEMESTER:</label> 
												    <input type="text" name="sem" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												 <label for="exampleInputPassword1">SECTION:</label> 
												    <input type="text" name="section" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												 <label for="exampleInputPassword1">BATCH:</label> 
												    <input type="text" name="batch" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												 <label for="exampleInputPassword1">FACULTY ADVISOR:</label> 
												    <input type="text" name="fac_adv" class="form-control">
											    </div>
											</div>
								  		<!-- ___________________________
								  											Hidden Values are here
								  		___________________________ -->
								  		<div>
											<input type="hidden" name="password" value="student123*">
											<input type="hidden" name="role" value="Student">
								  		</div>
								  		<!-- ___________________________
								  											Hidden Values are end here
								  		___________________________ -->
								  		<div class="modal-footer">
						   		            <input type="submit" class="btn btn-primary" name="btn_save">
		      								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									    </div>
									</form>
						        </div>
						    </div>
					   </div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<div class="row">
								<div class="col-md-6">
									<form action="search_student.php" method="post">
										<div class="form-group">
											<label for="exampleInputPassword1"><h5>Search:</h5></label>
											<div class="d-flex">
												<input type="text" name="search" id="search" class="form form-control" placeholder="Enter USN">
												<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
											</div>
										</div>
									</form>
								</div>	
								<div class="col-md-12 pt-5 mb-2">
									<!-- Large modal -->
									<button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target=".bd-example-modal-lg1">Assign Subjects</button>
									<a class="btn btn-success" href="asign-single-student-subjects.php"> Assign Single Student Subject</a>
									<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">Assign Subjects To Student</h4>
													</div>
													<div class="modal-body">
														<form action="student.php" method="POST" enctype="multipart/form-data">
															<div class="row mt-3">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Select Course:*</label>
																		<select class="browser-default custom-select" name="course_code" required="">
																			<option >Select Course</option>
																			<?php
																				$query="select course_code from courses";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1" required>Enter Semester:*</label>
																		<input type="text" name="semester" class="form-control">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1">Enter USN:*</label>
																		<input type="text" name="roll_no" class="form-control">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1">Select Subject:*</label>
																		<select class="browser-default custom-select" name="subject_code" required="">
																			<option >Select Subject</option>
																			<?php
																				$query="select subject_code from course_subjects";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>	
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save2">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>USN</th>
									<th>Student Name</th>
									
									<th>Course ID</th>
									
									<th colspan="1">Operations</th>
								</tr>
								<?php 
								$query="select first_name,roll_no,course_code from student_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["roll_no"] ?></td>
										<td><?php echo $row["first_name"]." " ?></td>
										
										<td><?php echo $row["course_code"] ?></td>
										<td width='170'> 
											<?php 
												echo "<a class='btn btn-danger' href=delete-function.php?roll_no=".$row['roll_no'].">Delete</a> "
											?>
										</td>
									</tr>
								<?php }
								?>
							</table>				
						</section>
					</div>
				</div>	 
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>