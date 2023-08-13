<?php
session_start();
if (!$_SESSION["user_id"]) {
  header('location: ../login/login.php');
}
require_once "../connection/connection.php";
?>
<?php
$semi='1';
if (isset($_POST['sub1'])) {
  $semi = $_POST['sem'];
}
?>


<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<html lang="en">
<?php include('../include/header.php');
?>


<body class="g-sidenav-show  bg-gray-100">
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../include/dashboardnav.php'); ?>
    <!-- End Navbar -->
    <br>
    <br><br><br>
  <br>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Attendence</h6>
            </div>
            <form action="attendence.php" method="POST">
              <div class="text-middle-align">
                <div class="dropdown" style="text-align: right; margin-right:20px;">
                  <select class="browser-default custom-select" style="background-color:purple;color:white" name="sem">
                  <!-- <option value="1" selected>1</option> -->
                    <?php

                    $query = "select distinct SEMESTER as sem from subject ORDER BY SEMESTER";
                    $run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($run)) {
                      echo "<option  value=" . $row['sem'] . ">" . $row['sem'] . "</option>";
                    }
                    ?>

                  </select>
                  <span class="material-symbols-outlined">
                    <input type="submit" name="sub1" value="move" />

                  </span>

                </div>
            </form>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Classes Held</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Classes Attended</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Percentage</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    
                    $user_id = $_SESSION['user_id'];
                    $query = "select s.sub_code,avg(ma.ATTNPER) as pert,s.sub_name,sum(ma.MnthlyTotClasses) as Tot_cls,sum(ma.MnthlyTotAttended) as MnthTotAtt from monthlyattn ma, subject s WHERE ma.SUB_CODE = s.SUB_CODE and  s.SEMESTER='$semi' and  ma.ST_NO ='$user_id' GROUP BY ma.SUB_CODE";
                    $run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($run)) { ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2">
                            <?php
                            $ptr = $row['pert'];
                            $string = floatval($ptr);
                            $formatted = number_format($string, 2, '.', '');
                        
                            ?>
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm"><?php echo $row['sub_name'] ?></h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm font-weight-bold mb-0"><?php echo $row['sub_code'] ?></p>
                        </td>
                        <td>
                          <p class="text-sm font-weight-bold mb-0"><?php echo $row['Tot_cls'] ?></p>
                        </td>
                        <td>
                          <span class="text-xs font-weight-bold"><?php echo $row['MnthTotAtt'] ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold"><?php echo $formatted ?>%</span>
                          </div>
              </div>
              </td>
              </tr>

            <?php } ?>
            </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('../include/footer.html'); ?>
    </div>
  </main>
</body>

</html>