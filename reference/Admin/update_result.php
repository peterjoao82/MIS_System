<?php  
    session_start();
    if (!$_SESSION["LoginAdmin"])
    { 
       
        header('location:../login/login.php');
    }
        require_once "../connection/connection.php";
    ?>
<?php
    $message = "";
    $success_message = "";
    $error_message = "";
    if (isset($_POST['sub'])) {
        $count=$_POST['count'];
        
        for ($i=0; $i < $count; $i++) { 
            $date=date("d-m-y");
            $que="update class_result set IA1='".$_POST['IA1'][$i]."',IA2='".$_POST['IA2'][$i]."',IA3='".$_POST['IA3'][$i]."',obtain_marks='".$_POST['obtain_marks'][$i]."' where class_result_id='".$_POST['class_result_id'][$i]."'";
            $run=mysqli_query($con,$que);
            if ($run) {
                $success_message = "All Results Has Been Submitted Successfully";
            }   
            else{
                $error_message =  "All Results Has Not Been Submitted Successfully";
            }
        }
    }

?>
   
<!doctype html>
<html lang="en">
    <head>
        <title>Student Result</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/admin-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
            <div class="sub-main sub-main-student">
                <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4 class="">Student Result</h4>
                </div>
                <div class="row ml-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <?php
                                if($success_message==true){
                                    $bg_color = "alert-success";
                                    $message = $success_message;
                                }
                                else if($error_message==true){
                                    $bg_color = "alert-danger"; 
                                    $message = $error_message;
                                }
                            ?>
                            <h5 class="py-2 pl-3 <?php echo $bg_color; ?>">
                                
                                <?php echo $message ?>
                            </h5>
                        </div>
                     
                        <form action="update_result.php" method="post">
                        
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group" style="z-index: 10;">
                                        <label>Select Course:</label>
                                        <select class="browser-default custom-select" name="course_code">
                                            <option >Select Course</option>
                                            <?php
                                            $query="select course_code from courses";
                                            $run=mysqli_query($con,$query);
                                            while($row=mysqli_fetch_array($run)) {
                                            echo    "<option value=".$row['course_code'].">".$row['course_code']."</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Semester:</label>
                                        <select class="browser-default custom-select" name="semester">
                                            <option >Select Semester</option>
                                            <?php
                                            $teacher_id=$_SESSION['teacher_id'];
                                            $query="select distinct(semester) as semester from course_subjects";
                                            $run=mysqli_query($con,$query);
                                            while($row=mysqli_fetch_array($run)) {
                                            echo    "<option value=".$row['semester'].">".$row['semester']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select Subject:</label>
                                        <div class="d-flex">
                                            <select class="browser-default custom-select" name="subject_code" required="">
                                                <option >Select Subject</option>
                                                <?php
                                                    $query1="select subject_code,subject_name from course_subjects where subject_code not in (select subject_code from class_result)";
                                                    $query="select subject_code,subject_name from course_subjects";
                                                    $run=mysqli_query($con,$query);
                                                    while($row=mysqli_fetch_array($run)) {
                                                    echo    "<option value=".$row['subject_code'].">".$row['subject_name']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" name="press" class="btn btn-primary px-4" value="Press">
</div>

                            </div>  
                        </form>
                    </div>
                </div>
                                <div class="row">
                    <div class="col-md-12 ml-2">
                        <section class="border mt-3">
                            <table class="w-100 table-elements table-three-tr" cellpadding="3">
                                <tr class="table-tr-head table-three text-white">
                                    <th>Sr.No</th>
                                    <th>Roll No</th>
                                    <th>Course Name</th>
                                    <th>Subject Name</th>
                                    <th>Semester</th>
                                    <th>Student Name</th>
                                    <th>IA1</th>
                                    <th>IA2</th>
                                    <th>IA3</th>
                                    <th>Total Marks</th>
                                    <th>Final IA Marks</th>
                                </tr>
                                <?php  
                                $i=1;
                                $count=0;
                                    if (isset($_POST['press'])) {
                                
                                        $course_code=$_POST['course_code'];
                                        $semester=$_POST['semester'];
                                        $subject_code=$_POST['subject_code'];

                                        $que="select cr.*,s.first_name from class_result cr,student_info s where cr.course_code='$course_code' and cr.semester='$semester' and cr.subject_code='$subject_code' and s.roll_no=cr.roll_no";
                                    $run=mysqli_query($con,$que);
                                    while ($row=mysqli_fetch_array($run)) {
                                        $count++;
                                    ?>
                                        <form action="update_result.php" method="post">
                                        <tr>
                                        <td><?php echo $i++ ?></td>
                                            <td><?php echo $row['roll_no'] ?></td>
                                            <input type="hidden" name="roll_no[]" value=<?php echo $row['roll_no'] ?> >
                                            <td><?php echo $row['course_code'] ?></td>
                                            <input type="hidden" name="course_code[]" value=<?php echo $row['course_code'] ?> >
                                            <td><?php echo $row['subject_code'] ?></td>
                                            <input type="hidden" name="subject_code[]" value=<?php echo $row['subject_code'] ?> >
                                            <td><?php echo $row['semester'] ?></td>
                                            <input type="hidden" name="semester[]" value=<?php echo $row['semester'] ?> >
                                            <td><?php echo $row['first_name']." " ?></td>
                                            <td><input type="text" name="IA1[]" placeholder="Plz Enter Obtain Marks" class="form-control" value=<?php echo $row['IA1']?>></td>
                                            
                                            <td><input type="text" name="IA2[]" placeholder="Plz Enter Obtain Marks" class="form-control" value=<?php echo $row['IA2']?>></td>
                                            
                                            <td><input type="text" name="IA3[]" placeholder="Plz Enter Obtain Marks" class="form-control" value=<?php echo $row['IA3']?>></td>
                                            
                                    
                                            <td class="text-center"><?php echo "100" ?></td>
                                            <input type="hidden" name="total_marks[]" value="100" >
                                            <td><input type="text" name="obtain_marks[]" placeholder="Plz Enter Final Marks" class="form-control" value=<?php echo $row['obtain_marks']?>></td>
                                            <input type="hidden" name="class_result_id[]" value="<?php echo $row['class_result_id'] ?>">
                                            <input type="hidden" name="count" value="<?php echo $count ?>">

                                       </tr>
                                        
                                <?php
                                    }
                                }
                                
                                
                                    
                                ?>
                                <input type="submit" name="sub">

                                </form>
                            </table>                
                        </section>
                    </div>
                </div>
            </div>
        </main>
</body>
</html>                      
                                
                        </form>
                    </div>
                </div>  
            </div>
        </main>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>