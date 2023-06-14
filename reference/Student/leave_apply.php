<?php  
    session_start();
    if (!$_SESSION["LoginStudent"])
    {
        header('location:../login/login.php');
    }
        require_once "../connection/connection.php";
    ?>
    <?php
    $roll_no=$_SESSION['LoginStudent'];
    $q1="select fac_adv from student_info where roll_no='$roll_no'";
        $run1=mysqli_query($con,$q1);
        $getID=mysqli_fetch_assoc($run1);
        $fac_adv=$getID['fac_adv'];
    ?>
<?php  
    if (isset($_POST['sub'])) {
        $roll_no=$_SESSION['LoginStudent'];
        $reason=$_POST['reason'];
        $date_from=$_POST['date_from'];
        $date_to=$_POST['date_to'];
        #$file=$_FILES['file'];
        #$fileName=$_FILES['file']['name'];
        #$fileTmpName=$_FILES['file']['tmp_name'];

        #$fileSize=$_FILES['file']['size'];
        #$fileError=$_FILES['file']['error'];
        #$fileType=$_FILES['file']['type'];
        #$fileExt=explode('.',$fileName);
        #$fileActualExt=strtolower(end($fileExt));
        #$allowed=array('jpg','jpeg','png','pdf');
        #$fileNameNew=uniqid('',true).".".$fileActualExt;
        #$fileDestination='uploads/'.$fileNameNew;
        #move_uploaded_file($fileTmpName,$fileDestination);
        $date=date("d-m-y");
        
        $query3="insert into leave_apply(roll_no, reason, date_from, date_to, fac_adv) values ('$roll_no','$reason','$date_from','$date_to','$fac_adv')";
    

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
        <title>Student Leave Application</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
        <?php include('../common/student-sidebar.php') ?>  

        <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
            <div class="sub-main sub-main-student">
                <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
                    <h4 class="">Leave Application</h4>
                </div>
                <div class="row ml-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form action="leave_apply.php" method="post" enctype="multipart/form-data">
                           
                            <div class="row">
                                <div class=" col-lg-6 col-md-6 pr-5">
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Enter your reason:</label>
                                        <input type="text" name="reason" class="form-control"  placeholder="Enter you reason" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 pr-5">
                                <div class="form-group">
                                        <label for="exampleInputPassword1">From the date:</label>
                                        <input type="date" name="date_from" class="form-control"  placeholder="Enter the date" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-5">
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Till the date:</label>
                                        <input type="date" name="date_to" class="form-control"  placeholder="Enter the date" required>
                                </div>
                                </div>
                                <!--<div class="col-md-6 pr-5">
                                <div class="form-group">
                                        <label for="exampleInputPassword1">Attach Files(if any):</label>
                                        
                                        <input type="File" name="file">
                                </div>
                                </div>-->

                                <div class="col-md-7 pr-8">
                                    <div class="form-group pt-2">
                                        <input type="submit" name="sub" value="Submit" class="btn btn-primary">
                                    </div>
                                </div>
                                <?php  ?>
                                </form>
                    </div>
                </div>  
            </div>
        </main>
        <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>