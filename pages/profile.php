<?php
session_start();
if (!$_SESSION["user_id"]) {
  header('location: ../login/login.php');
}
require_once "../connection/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../include/header.php'); ?>

<body class="g-sidenav-show bg-gray-100">
<?php include('../include/link.html'); ?>
    <?php include('../include/dashboardnav.php'); ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
            <div class="row ml-4">
              <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="profile.php" method="post">
                  <?php $user_id = $_SESSION['user_id'];
                  $query = "SELECT DISTINCT sm.ST_NO as USN, sm.FNAME as Fname,sm.BR_CODE as bcode,sm.MOBILE_NO as mb,sm.StCollegeEMail as email, PASSWD as pass FROM studentmaster sm, employee e WHERE sm.ST_NO='$user_id'";
                  $run = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($run)) { ?>
                    <div class="row">
                      <div class=" col-lg-6 col-md-6 pr-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name:</label>
                          <input type="text" max="999" class="form-control" name="first_name" value=<?php echo $row['Fname'] ?> readonly>
                        </div>
                      </div>

                      <div class="col-md-6 pr-5">
                        <div class="form-group">
                          <label for="exampleInputPassword1">USN</label>
                          <input type="text" class="form-control" name="course_code" value="<?php echo $row['USN'] ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Branch:</label>
                          <input type="text" class="form-control" name="section" value=<?php echo $row['bcode'] ?> readonly>
                        </div>
                      </div>
                      <div class="col-md-6 pr-5">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Mobile Number:</label>
                          <input type="text" class="form-control" name="batch" value=<?php echo $row['mb'] ?> readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-md-6 pr-5">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Semester</label>
                          <input type="text" name="semester" class="form-control" placeholder="Semester" value=<?php echo $row['email'] ?> readonly>
                        </div>
                      </div>

                    </div>
                  <?php } ?>
                </form>
              </div>
            </div>

            </ul>
          </div>
        </div>
      </div>
  </div>
  </div>

  </div>
  <?php include('../include/footer.html'); ?>
</body>

</html>