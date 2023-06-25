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
<?php include('../include/dashboardnav.php'); ?>
<br><br><br>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Marks</h6>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <br></br>
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SUB CODE</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SUB NAME</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">IA - 1</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">IA - 2</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">IA - 2</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">IA_LAB - 1</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">IA_LAB - 2</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">GRADE</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">CREDITS</th>
                    

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                   if (isset($_GET['SEMESTER'])) {
                    $semi=$_GET['SEMESTER'];
                    $roll_no = $_SESSION['user_id'];
                    $query = "SELECT m.SUB_CODE ,s.SUB_NAME,s.SEMESTER, m.IA_1 AS ia1,m.IA_2 AS ia2 ,m.IA_3 as ia3,m.IA_LAB AS lab1,m.IA_LAB2 AS lab2, m.GRADE AS grade,m.Credits as cre FROM marks m, subject s WHERE m.SUB_CODE=s.SUB_CODE AND m.ST_NO='$roll_no' AND s.SEMESTER='$semi' GROUP by s.SUB_CODE";
                    $run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($run)) {
                    ?>
                      <tr>
                        <td><?php echo $row['SUB_CODE'] ?></td>
                        <td><?php echo $row['SUB_NAME'] ?></td>
                        <td><?php echo $row['SEMESTER'] ?></td>
                        <td><?php echo $row['ia1'] ?></td>
                        <td><?php echo $row['ia2'] ?></td>
                        <td><?php echo $row['ia3'] ?></td>
                        <td><?php echo $row['lab1'] ?></td>
                        <td><?php echo $row['lab2'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <td><?php echo $row['cre'] ?></td>
                      </tr>
                    <?php
                    }
                    }
                    ?>



                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</html>