<?php  
    session_start();
    if (!$_SESSION["LoginAdmin"])
    {
        header('location:../login/login.php');
    }
        require_once "../connection/connection.php";
    ?>
    <?php 
 
 if (isset($_POST['btn_save'])) {

     $course_code=$_POST["course_code"];

     $batch=$_POST["batch"];

     
     $day=$_POST["day"];
     $p1=$_POST["p1"];
     $p2=$_POST["p2"];
     $p3=$_POST["p3"];
     $p4=$_POST["p4"];
     $p5=$_POST["p5"];
     $p6=$_POST["p6"];
     $p7=$_POST["p7"];
     

     
     $query="insert into time_table(course_code,batch,day,p1,p2,p3,p4,p5,p6,p7)values('$course_code','$batch','$day','$p1','$p2','$p3','$p4','$p5','$p6','$p7')";
     $run=mysqli_query($con, $query);
     if ($run) {
         echo "Your Data has been submitted";
     }
     else {
         echo "Your Data has not been submitted";
     }
 }
?>
<?php 
 
 if (isset($_POST['btn_update'])) {

     echo $course_code=$_POST["course_code"];

     echo $batch=$_POST["batch"];
     echo $day=$_POST["day"];
     echo$p1=$_POST["p1"];
     echo $p2=$_POST["p2"];
     echo $p3=$_POST["p3"];
     echo$p4=$_POST["p4"];
     echo $p5=$_POST["p5"];
     echo $p6=$_POST["p6"];
     echo $p7=$_POST["p7"];
    

     $query1="update time_table set course_code='$course_code',batch='$batch',day='$day',p1='$p1',p2='$p2',p3='$p3',p4='$p4',p5='$p5',p6='$p6',p7='$p7' where batch='$batch' and day='$day'";
     $run1=mysqli_query($con, $query1);
     if ($run1) {
         echo "Your Data has been updated";
     }
     else {
         echo "Your Data has not been updated";
     }



     
 }
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Admin - Time Table</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/admin-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
            <div class="sub-main">
                <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <div class="d-flex">
                        <h4 class="mr-5">Time Table Management System </h4>
                        <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Time Table</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ml-2">
                        <section class=" mt-3">
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-3 ml-5 ">
                                    <div class="col-md-12 pt-3 ml-5">
                                        <!-- Large modal -->
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info text-white">
                                                        <h4 class="modal-title text-center">Add Time Table</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="tm_table.php" method="post">
                                                            <div class="row mt-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Course Code: </label>
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
                                                                
                                                           <div class="row"> 
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Lecture Day: </label>
                                                                        <select class="browser-default custom-select" name="day">
                                                                            <option >Select Week Day</option>
                                                                            <?php
                                                                            
                                                                            $query="select * from weekdays";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo "<option value=".$row['day_name'].">".$row['day_name']."</option>";
                                                                            }
                                                                            
                                                        
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-4">
                                                <div class="form-group">
                                                 <label for="exampleInputPassword1">Batch:</label> 
                                                    <input type="text" name="batch" class="form-control">
                                                </div>
                                            </div>
                                                                      <div class="row-mt-6" >  
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">1 Subject:*</label>
                                                                    <select class="browser-default custom-select" name="p1" required="">
                                                                        <option >Select Subject</option>
                                                                        <?php
                                                                            $query="select * from course_subjects";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo    "<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <div class="formp">
                                                                        <label for="exampleInputPassword1"> 2 Subject:*</label>
                                                                    <select class="browser-default custom-select" name="p2" required="">
                                                                        <option >Select Subject</option>
                                                                        <?php
                                                                            $query="select * from course_subjects";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo    "<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                                                                         
                                                              <div class="col-md-3">
                                                                    <div class="formp">
                                                                        <label for="exampleInputPassword1"> 3 Subject:*</label>
                                                                    <select class="browser-default custom-select" name="p3" required="">
                                                                        <option >Select Subject</option>
                                                                        <?php
                                                                            $query="select * from course_subjects";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo    "<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            
                                                            <div class="row-mt-6" >                                                            
                                                              <div class="col-md-10">
                                                                    <div class="formp">
                                                                        <label for="exampleInputPassword1"> 4 Subject:*</label>
                                                                    <select class="browser-default custom-select" name="p4" required="">
                                                                        <option >Select Subject</option>
                                                                        <?php
                                                                            $query="select * from course_subjects";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo    "<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                              
                                                              <div class="col-md-3">
                                                                    <div class="formp">
                                                                        <label for="exampleInputPassword1"> 5 Subject:*</label>
                                                                    <select class="browser-default custom-select" name="p5" required="">
                                                                        <option >Select Subject</option>
                                                                        <?php
                                                                            $query="select * from course_subjects";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo    "<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                                                                          
                                                             <div class="col-md-3">
                                                                    <div class="formp">
                                                                        <label for="exampleInputPassword1"> 6 Subject:*</label>
                                                                    <select class="browser-default custom-select" name="p6" required="">
                                                                        <option >Select Subject</option>
                                                                        <?php
                                                                            $query="select * from course_subjects";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo    "<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            
                                                            <div class="col-md-3">
                                                                    <div class="formp">
                                                                        <label for="exampleInputPassword1"> 7 Subject:*</label>
                                                                    <select class="browser-default custom-select" name="p7" required="">
                                                                        <option >Select Subject</option>
                                                                        <?php
                                                                            $query="select * from course_subjects";
                                                                            $run=mysqli_query($con,$query);
                                                                            while($row=mysqli_fetch_array($run)) {
                                                                            echo    "<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                        </div>
                                                           
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>  
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="w-100 table-elements table-three-tr" cellpadding="3">
                                        <tr class="table-tr-head table-three text-white">
                                            <td colspan="10" class="text-center text-white"><h4>Classes Time Table</h4></td>
                                            <td width="10" >                                            
                                         
                                            </td>
                                        </tr>
										
                                        <tr class="table-tr-head">
                                            <th>Course Code</th>
                                            <th>Batch Name</th>
                                            <th>Day</th>
                                            <th>Period 1</th>
                                            <th>Period 2</th>
                                            <th>Period 3</th>
                                            <th>Period 4</th>
                                            <th>Period 5</th>
                                            <th>Period 6</th>
                                            <th>Period 7</th>
                                            
                                        </tr>
                                        <?php  
                                            $query="select course_code,day,batch,p1,p2,p3,p4,p5,p6,p7 from time_table";
                                            $run=mysqli_query($con,$query);
                                            while($row=mysqli_fetch_array($run)) {
                                                echo "<tr>";
                                                
                                                echo "<td>".$row["course_code"]."</td>";
                                               
                                                echo "<td>".$row["day"]."</td>";
                                                echo "<td>".$row["batch"]."</td>";
                                                echo "<td>".$row["p1"]."</td>";
                                                echo "<td>".$row["p2"]."</td>";
                                                echo "<td>".$row["p3"]."</td>";
                                                echo "<td>".$row["p4"]."</td>";
                                                echo "<td>".$row["p5"]."</td>";
                                                echo "<td>".$row["p6"]."</td>";
                                                echo "<td>".$row["p7"]."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>              
                        </section>
                    </div>
                </div>
            </div>
        </main>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>