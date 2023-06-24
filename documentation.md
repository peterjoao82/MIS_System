<!-- //login code for reference
<?php 
session_start();
    require_once "../connection/connection.php"; 
    $message="USN Or Password Does Not Match";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"]; email is value name
        $password=$_POST["password"];  password is value name

        $query="select * from login where user_id='$username' and Password='$password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["Role"]=="Student")
                {
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../pages/dashboard.php');
                }
            }
        }
        else
        { 
            header("Location: login-in.php");
        }
    }
?>


//logout code
<?php
session_start();
unset($_SESSION['LoginUser']);
session_destroy();
header("location:../index.php");
?>
//connection code
<?php 
	$con=mysqli_connect("localhost","root","","jagruthi");
	if(!$con)
	{
		echo "Connection is not Successfully";
	}
?>
or
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

//login success for every page 
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
        require_once "../connection/connection.php";
	?>

//fetch data from database
<div class="form-group">
			<label for="exampleInputEmail1">Select Institute:</label>
										<select class="browser-default custom-select" name="course_code">
											<option >Select Institute</option>
											<?php
											$query="select distinct(course_code) as course_code from course_subjects";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
											}
											?>
										</select>
									</div>


//fetch data and display in table order
<?php
	$message = "";
	$success_message = "";
	$error_message = "";
	if (isset($_POST['sub'])) {
		$count=$_POST['count'];
		for ($i=0; $i < $count; $i++) { 
			$date=date("d-m-y");
			$que="insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks,result_date)values('".$_POST['roll_no'][$i]."','".$_POST['course_code'][$i]."','".$_POST['subject_code'][$i]."','".$_POST['semester'][$i]."','".$_POST['total_marks'][$i]."','".$_POST['obtain_marks'][$i]."','$date')";
			$run=mysqli_query($con,$que);
			if ($run) {
				$success_message = "All Results Has Been Submitted Successfully";
			}	
			else{
				$error_message = "All Results Has Not Been Submitted Successfully";
			}
		}
	}

?>

<table class="w-100 table-elements table-three-tr" cellpadding="3">
								<tr class="table-tr-head table-three text-white">
									<th>Sr.No</th>
                                    <th>Roll No</th>
                                    <th>Student Name</th>
									<th>Task Code</th>
									<th>Semester</th>
									<th>Total Marks</th>
									<th>Obtain Marks</th>
								</tr>
								<?php  
								$i=1;
								$count=0;
									if (isset($_POST['submit'])) {
										$course_code=$_POST['course_code'];
										$roll_no=$_POST['roll_no'];


										$que="select student_info.roll_no,first_name,middle_name,last_name,student_courses.semester, student_courses.course_code,subject_code from student_courses inner join student_info on student_info.roll_no=student_courses.roll_no where student_courses.course_code='$course_code' and student_courses.roll_no='$roll_no'";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
										$count++;
									?>
										<form action="add-single-student-results.php" method="post">
										<tr>
											<td><?php echo $i++ ?></td>
											<td><?php echo $row['roll_no'] ?></td>
                                            <input type="hidden" name="roll_no[]" value=<?php echo $row['roll_no'] ?> >
                                            <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
											<input type="hidden" name="course_code[]" value=<?php echo $row['course_code'] ?> >
											<td><?php echo $row['subject_code'] ?></td>
											<input type="hidden" name="subject_code[]" value=<?php echo $row['subject_code'] ?> >
											<td><?php echo $row['semester'] ?></td>
											<input type="hidden" name="semester[]" value=<?php echo $row['semester'] ?> >
											<td class="text-center"><?php echo "100" ?></td>
											<input type="hidden" name="total_marks[]" value="100" >
											<td><input type="text" name="obtain_marks[]" placeholder="Plz Enter Obtain Marks" class="form-control" required></td>
											<input type="hidden" name="count" value="<?php echo $count ?>">
										</tr>
								<?php		
									}
									}
								?>
								<input type="submit" name="sub">

								</form>
							</table>



//to display data from database
<table class="w-100 table-elements table-one-tr"cellpadding="2">
									<tr class="pt-5 table-one text-white" style="height: 32px;">
										<th>College Code</th>
										<th>Time</th>
										<th>Day</th>
										<th>Task</th>
										<th>Room No</th>
									</tr>
									<?php  
										$query="select * from time_table tt inner join weekdays wd on tt.day=wd.day_id";
										$run=mysqli_query($con,$query);
										while($row=mysqli_fetch_array($run)) {
											echo "<tr>";
											echo "<td>".$row["course_code"]." ".$row["semester"]."</td>";
											echo "<td>".$row["timing_from"]."<br>".$row["timing_to"]."</td>";
											echo "<td>".$row["day_name"]."</td>";
											echo "<td>".$row["subject_code"]."</td>";
											echo "<td>".$row["room_no"]."</td>";
											echo "</tr>";
										}
									?>
								</table>


//or 


<table class="w-100 table-elements table-three-tr"cellpadding="2">
									<tr class="pt-5 table-three text-white" style="height: 32px;">
										<th>Institute Code</th>
										<th>Institute Name</th>
										<th>Semester</th>
										<th>Total Task</th>
										<th>Total Work days</th>
									</tr>
									<?php  
										$query="select course_code,course_name,semester,count(subject_code) as subject_code,sum(credit_hours) as credit_hours from course_subjects join courses using(course_code) group by course_code, semester";
										$run=mysqli_query($con,$query);
										while($row=mysqli_fetch_array($run)) {
											echo "<tr>";
											echo "<td>".$row["course_code"]."</td>";
											echo "<td>".$row["course_name"]."</td>";
											echo "<td>".$row["semester"]."</td>";
											echo "<td>".$row["subject_code"]."</td>";
											echo "<td>".$row["credit_hours"]."</td>";
											echo "</tr>";
										}
									?> 
								</table>



//establish secure login and encrpyt password
<?php
$db_host = "localhost";
$db_name = "secure_pass";
$db_pass = "";
$db_user = "root";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn){
	die ('Failed to connect with server');
}
?>
<form action="index.php" method="POST">
<label for="username">Username</label>
<input type="text" name="username" required><br><br>

<label for="password">Password</label>
<input type="password" name="password" required><br><br>
<input type="submit" name="submit" value="submit">
</form>
<?php
//Include database connection file
include 'dbconn.php';

if (isset($_POST['submit'])){
	$username = $_POST['username'];

	// Normal Password
	$pass = $_POST['password'];

	// Securing password using password_hash
	$secure_pass = password_hash($pass, PASSWORD_BCRYPT);

	$sql = "INSERT INTO login_tb (u_username, u_password)
	VALUES('$username', '$secure_pass')";
	$result = mysqli_query($conn, $sql);
}

// Include HTML sign up form
include 'signup_form.php';
?>




to display user id in top
<h4 class=""> MIS - Welcome  <span><?php $Student_USN=$_SESSION['user_id'];
                    $query="SELECT * FROM studentmaster WHERE ST_NO='$Student_USN'";
                    $run=mysqli_query($conn,$query);
                    while ($row=mysqli_fetch_array($run)) {
                        echo $row['ST_NO'];
                    }
                    ?> To Dashboard </h4>


					//hello



					 -->