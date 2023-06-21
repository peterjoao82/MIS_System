<!---------------- Session starts form here ----------------------->
<?php  
    session_start();
    // if (!$_SESSION["LoginAdmin"])
    // {
    //     header('location:../login/login.php');
    // }
        require_once "../connection/connection.php";
    ?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['sub'])) {
    $semestr=$_POST['sem1'];
    //$semester=$_POST['semester'];

echo ".$semestr";
   // $que ="call inc_sem('$course_code','$semester')";
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Admin - ADVANCE SEMESTER</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/admin-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
            <div class="sub-main">
                <div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4>BEGIN NEW SEMESTER</h4>
                </div>
                <div class="row w-100">
                    <div class="col-md-12">
                        <form action="rial.php" method="post">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group" style="z-index: 10;">
                                        <label>Enter Course Id:</label>
                                        <select class="browser-default custom-select" name="sem1">
                                            <option >Select Course</option>
                                            <?php
                                            
                                            $query="select distinct SEMESTER as sem from subject";
                                            $run=mysqli_query($conn,$query);
                                            while($row=mysqli_fetch_array($run)) {
                                                echo    "<option value=".$row['sem'].">".$row['sem']."</option>";
                                            }
                                     
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Select Semester:</label>
                                        <!-- <select class="browser-default custom-select" name="semester">
                                            <option >Select Semester</option>
                                            <?php
                                           
                                           // $query="select distinct(semester) as semester from student_info";
                                            //$run=mysqli_query($con,$query);
                                            //while($row=mysqli_fetch_array($run)) {
                                            //echo    "<option value=".$row['semester'].">".$row['semester']."</option>";
                                            //}
                                            ?>
                                        </select> -->
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <input type="submit" name="sub" class="btn btn-primary px-5" value="Submit">
                                </div>
                            
                                
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

 