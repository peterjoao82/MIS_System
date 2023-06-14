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
        <title>Student - Result</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/student-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
            <div class="sub-main">
                <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4 class="">Result Summary Of <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from student_info where roll_no='$roll_no'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name'];
					}
					?></h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <section class="mt-3">
                            <table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10" >
                                <tr class="text-center text-white table-three table-tr-head">
                                    <th>Term</th>
                                    <th>Course</th>
                                    <th>Subject</th>
                                    <th>Credits</th>
                                    <th>IA1</th>
                                    <th>IA2</th>
                                    <th>IA3</th>
                                    <th>Final IA</th>
                                </tr>
                                <?php 
                            
                                $obtain_marks=0;
                
                                    $roll_no=$_SESSION['LoginStudent'];
                                    $query="select * from class_result cr inner join course_subjects cs on cr.subject_code=cs.subject_code where cr.roll_no='$roll_no'";
                                    $run=mysqli_query($con,$query);
                                    while ($row=mysqli_fetch_array($run)) { ?>
                                        <tr class="text-center">
                                            <td><?php echo $row['course_code']."-".$row['semester'] ?></td>
                                            <td><?php echo $row['course_code'] ?></td>
                                            <td><?php echo $row['subject_code'] ?></td>
                                            <td><?php echo $row['credit_hours'] ?></td>
                                            <td><?php echo $row['IA1'] ?></td>
                                            <td><?php echo $row['IA2'] ?></td>
                                            <td><?php echo $row['IA3'] ?></td>
                                            <td><?php echo $row['obtain_marks'] ?></td>
                                    
                            
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