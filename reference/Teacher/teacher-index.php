 <!---------------- Session starts form here ----------------------->
<?php  
    session_start();
    if (!$_SESSION["LoginTeacher"])
    {
        header('location:../login/login.php');
    }
        require_once "../connection/connection.php";
    ?>
<!---------------- Session Ends form here ------------------------>

<?php
    $_SESSION["LoginAdmin"]="";
    $teacher_email=$_SESSION['LoginTeacher'];
    $query1="select * from teacher_info where teacher_id='$teacher_email'";
    $run1=$run=mysqli_query($con,$query1);
    while($row=mysqli_fetch_array($run1)) {
        $teacher_id=$row["teacher_id"];
    }
?>


<html lang="en">
    <head>
        <title>Teacher - Dashboard</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/teacher-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
            <div class="sub-main">
                <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4 class="">Welcome To <?php $roll_no=$_SESSION['LoginTeacher'];
                    $query="select * from teacher_info where teacher_id='$teacher_email'";
                    $run=mysqli_query($con,$query);
                    while ($row=mysqli_fetch_array($run)) {
                        echo $row['first_name'];
                    }
                    ?> Dashboard </h4> </h4>
                </div>
                <!--
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div>
                            <section class="mt-3">
                                <div class="btn btn-block table-one text-light d-flex">
                                    <span class="font-weight-bold"><i class="fa fa-bell-o mr-3" aria-hidden="true"></i> Notifications</span>
                                    <a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
                                </div>
                                <div class="collapse show mt-2" id="collapsethree">
                                    <table class="w-100 table-elements table-one-tr"cellpadding="2">
                                        <tr>
                                            <td>Notification for teacher</td>
                                        </tr>
                                        <tr>
                                            <td>Notification for teacher</td>
                                        </tr>
                                        <tr>
                                            <td>Notification for teacher</td>
                                        </tr>
                                        <tr>
                                            <td>Notification for teacher</td>
                                        </tr>
                                        <tr>
                                            <td>Notification for teacher</td>
                                        </tr>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                -->
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <table class="w-100 table-striped table-hover table-dark"cellpadding="2" >
                            <tr>
                                <td colspan="12" class="text-center text-white"><h5>Teacher Guardian of:</h5></td>
                            </tr>
                            <tr>
                                <th>USN</th>
                                <th>Student Name</th>
                                <th>Course ID</th>
                                <th>Semester</th>
                                
                            </tr>
                            
                            <?php
                                $query="select first_name,roll_no,course_code,semester from student_info where fac_adv='$teacher_id' ";
                                $run=mysqli_query($con,$query);
                                while ($row=mysqli_fetch_array($run)) {?>
                                    <tr>
                                        <td><?php echo $row["roll_no"] ?></td>
                                        <td><?php echo $row["first_name"] ?></td>
                                        <td><?php echo $row["course_code"] ?></td>
                                        <td><?php echo $row["semester"] ?></td>

                                    </tr>
                                <?php }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>