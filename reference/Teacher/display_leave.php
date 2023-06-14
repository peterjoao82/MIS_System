<?php  
    session_start();
    if (!$_SESSION["LoginTeacher"])
    { 
       
        header('location:../login/login.php');
    }
        require_once "../connection/connection.php";
    ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Student Leave Application</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/teacher-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
            <div class="sub-main sub-main-student">
                <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4 class="">Leave Application</h4>
                </div>
                <div class="row ml-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     
                        <form action="teacher_apply.php" method="post">
                            <?php 
                                $sr=$_GET['sr'];
                                $fac_adv=$_SESSION['LoginTeacher'];
                                $query="select l.roll_no,l.reason,l.date_from,l.date_to,s.first_name,s.course_code,s.semester from leave_apply l,student_info s where l.sr='$sr' and l.fac_adv='$fac_adv' and s.roll_no=l.roll_no";
                                $run=mysqli_query($con,$query);
                                while ($row=mysqli_fetch_array($run)) {?>
                            <img src="$row['attach']" alt="">
                            <div class="row">
                                <div class=" col-lg-6 col-md-6 pr-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Student USN:*</label>
                                        <input type="text" class="form-control" name="roll_no" value= "<?php echo $row['roll_no']?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 pr-5">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Student Name:*</label>
                                        <input type="text" class="form-control" name="first_name"  value="<?php echo $row['first_name'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course Code:*</label>
                                        <input type="text" class="form-control" name="course_code" value="<?php echo $row['course_code'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-5">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Semester:*</label>
                                        <input type="text" class="form-control" name="semester"  value="<?php echo $row['semester'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Reason:*</label>
                                        <input type="text" class="form-control" name="reason" value="<?php echo $row['reason'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 pr-5">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">From the date:*</label>
                                        <input type="text" class="form-control" name="date_from"  value="<?php echo $row['date_from'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Till the date</label>
                                        <input type="text" class="form-control" name="date_to" value="<?php echo $row['date_to'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                             <!-- <iframe src="<?php #echo $row['attach'] ?>" width="90%" height="500px" > </iframe>  -->
                                                
                         <!-- <img src="../file:///C:/xampp/htdocs/college/Student/uploads/63c801a5a74a14.60634691.pdf"> -->
                         <?php 
                        #echo "<img src='{$row['attach']}' width='40%' height='40%'>"; 
                       
                                               
                            }    ?>
                       
                            
                                
                        </form>
                    </div>
                </div>  
            </div>
        </main>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>