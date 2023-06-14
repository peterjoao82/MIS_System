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


<!doctype html>
<html lang="en">
    <head>
        <title>Student - attendance</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/student-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
            <div class="sub-main">
                <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4 class="">Attendance Status Of  <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from student_info where roll_no='$roll_no'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name'];
					}
					?> - <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from student_info where roll_no='$roll_no'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['roll_no'];
					} ?> </h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <section class="mt-3">
                            <table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10" >
                                <tr class="text-center text-white table-three table-tr-head">
                                
                                    <th>Course</th>
                                    <th>Subject</th>
                                    <th>Semester</th>
                                    <th>Current Attendance</th>
                                    
                                </tr>
                                <?php 
                            
                            
                
                                    $roll_no=$_SESSION['LoginStudent'];
                                    $query="select * from student_attendance where student_id='$roll_no'";
                                    $run=mysqli_query($con,$query);
                                    while ($row=mysqli_fetch_array($run)) { ?>
                                        <tr class="text-center">
                                           
                                            <td><?php echo $row['course_code'] ?></td>
                                            <td><?php echo $row['subject_code'] ?></td>
                                            <td><?php echo $row['semester'] ?></td>
                                            <td><?php echo $row['attendance'] ?></td>
                                    
                            
                                        </tr>
                                    <?php
                                        
                                    }
                                ?>
                                
                            </table>    
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>