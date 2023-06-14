<!---------------- Session starts form here ----------------------->
<?php  
    session_start();

    if ($_SESSION["LoginAdmin"] && !$_SESSION['LoginTeacher'])
    {
        $teacher_id=$_GET['teacher_id'];
    }
    else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginTeacher']){
        $teacher_id=$_SESSION['LoginTeacher'];
        #$teacher_id="";
    }
    else{ ?>
        <script> alert("Your Are Not Autorize Person For This link");</script>
    <?php
        header('location:../login/login.php');
    }
    require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
    <head>
        <title>Admin - Teacher Information</title>
    </head>
    <body>
        <?php include('../common/common-header.php') ?>
    <?php
        if($teacher_id){
            $query="select * from teacher_info where teacher_id='$teacher_id'";
        }
      
        
        $run=mysqli_query($con,$query);
        while ($row=mysqli_fetch_array($run)) {
    ?>
        <div class="container  mt-1 border border-secondary mb-1">
            <div class="row text-white bg-primary pt-1">
                
                <div class="col-md-8">
                    <h3 class="ml-5"><?php echo $row['first_name'] ?></h3><br>
                    <div class="row">
                        <div class="col-md-6">
        
                            <h5>Teacher Id:</h5> <?php echo $row['teacher_id']  ?><br><br>
                        </div>      
                    </div>
                    
                </div>
                <hr>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>From Branch:</h5> <?php echo $row['teacher_status']  ?> </div>
            </div>
         
        <section class="mt-3">
                                <div class="btn btn-block table-two text-light d-flex">
                                    <span class="font-weight-bold"><i class="fa fa-file-text-o mr-3" aria-hidden="true"></i>Teaches Subject</span>
                                    <a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
                                    
                                </div>
                                <div class="collapse show mt-2" id="collapseOne">
                                    <table class="w-100 table-elements table-two-tr"cellpadding="2">
                                        <tr class="pt-5 table-two text-white" style="height: 32px;">
                                            
                                            <th>Course Code</th>
                                            <th>Subject Code</th>
                                            <th>Subject Name</th>
                                            <th>Semester</th>
                                        </tr>
                                        <?php 
                                            $query="select tc.course_code,tc.subject_code,tc.semester,tc.total_classes,cs.subject_name from teacher_courses tc inner join course_subjects cs on tc.subject_code=cs.subject_code where teacher_id='$teacher_id'";
                                            
                                            $run=mysqli_query($con,$query);
                                            while ($row=mysqli_fetch_array($run)) { ?>                              
                                        <tr>
                                        <td><?php echo $row['course_code'] ?></td>
                                            <td><?php echo $row['subject_code'] ?></td>
                                            <td><?php echo $row['subject_name'] ?></td>
                                            <td><?php echo $row['semester'] ?></td>
                                        
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </section>
        
        
        
        
        
        
        <!--
            <div class="row pt-3">
                <div class="col-md-4"><h5>Phone No:</h5> <?php #echo $row['other_phone']  ?></div>
                <div class="col-md-4"><h5>State:</h5> <?php #echo $row['state']  ?></div>
                <div class="col-md-4"><h5>Last Qualification:</h5> <?php #echo $row['last_qualification']  ?></div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>Permanent Adress:</h5> <?php #echo $row['permanent_address']  ?></div>
                <div class="col-md-4"><h5>Current Address:</h5> <?php #echo $row['current_address']  ?></div>
                <div class="col-md-4"><h5>Place of Birth:</h5> <?php #echo $row['place_of_birth']  ?></div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>Matric Complition Date:</h5> <?php #echo $row['matric_complition_date']  ?></div>
                <div class="col-md-4"><h5>Matric Awarded Date:</h5> <?php #echo $row['matric_awarded_date']  ?></div>
                <div class="col-md-4"><h5>Matric Certificate:</h5> <?php #echo $row['matric_certificate']  ?></div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>Fa Complition Date:</h5> <?php #echo $row['fa_complition_date']  ?></div>
                <div class="col-md-4"><h5>Fa Awarded Date:</h5> <?php #echo $row['fa_awarded_date']  ?></div>
                <div class="col-md-4"><h5>Fa Certificate:</h5> <?php #echo $row['fa_certificate']  ?></div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>BA Complition Date:</h5> <?php #echo $row['ba_complition_date']  ?></div>
                <div class="col-md-4"><h5>BA Awarded Date:</h5> <?php #echo $row['ba_awarded_date']  ?></div>
                <div class="col-md-4"><h5>BA Certificate:</h5> <?php #echo $row['ba_certificate']  ?></div>
            </div>
            <div class="row pt-3">
                <div class="col-md-4"><h5>MA Complition Date:</h5> <?php #echo $row['ma_complition_date']  ?></div>
                <div class="col-md-4"><h5>MA Awarded Date:</h5> <?php #echo $row['ma_awarded_date']  ?></div>
                <div class="col-md-4"><h5>MA Certificate:</h5> <?php #echo $row['ma_certificate']  ?></div>
            </div>-->
        </div>
    <?php } ?>
</body>
</html>