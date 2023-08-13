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
if (isset($_POST['viewdetails'])) {

  $_SESSION['semester'] = $semi;
  if (isset($_SESSION['semester'])) {

    header("Location: ../pages/detailmarks.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('../include/header.php'); ?>


<body class="g-sidenav-show  bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../include/dashboardnav.php'); ?>
    <br><br><br><br><br><br>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Marks - </h6>
            </div>            
            <form action="marks.php" method="POST">
              <div class="text-middle-align">
                <div class="dropdown" style="text-align: right; margin-right:20px;">
                  <select class="browser-default custom-select" style="background-color:purple;color:white" name="sem">
                 
                    <?php
                  
                    $query = "select distinct SEMESTER as sem from subject ORDER BY SEMESTER";
                    $run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($run)) {
                      echo "<option  value=" . $row['sem'] . ">" . $row['sem'] . "</option>";
                    }
                    ?>

                  </select>
                  <span class="material-symbols-outlined">
                    <input type="submit" name="sub1" value="Submit" />

                  </span>

                </div>
            </form>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <br></br>
                
                <table class="table align-items-center justify-content-center mb-0">
                  
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SUB CODE</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SUB NAME</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SEMESTER</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">AVERAGE MARKS</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                    $roll_no = $_SESSION['user_id'];
                    $query = "SELECT m.ST_NO,m.SUB_CODE ,s.SUB_NAME,s.SEMESTER, AVG(m.IA_1+m.IA_2+m.IA_3) as mm FROM marks m, subject s WHERE m.SUB_CODE=s.SUB_CODE AND m.ST_NO='$roll_no' AND s.SEMESTER='$semi' GROUP by s.SUB_CODE";
                    $run = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($run)) {
                    ?>
                      <tr>
                        <td><?php echo $row['SUB_CODE'] ?></td>
                        <td><?php echo $row['SUB_NAME'] ?></td>
                        <td><?php echo $row['SEMESTER'] ?></td>
                        <td><?php echo $row['mm'] ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                </table>
                <center><td><?php echo "<a target='_blank' class='btn btn-info' href=detailmarks.php?SEMESTER=".$semi.">View Details</a> "?></td></center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include('../include/footer.html'); ?>
</body>

</html>