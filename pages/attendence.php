
<?php session_start();
    require_once "../connection/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
 <?php include('../include/header.php'); ?>


<body class="g-sidenav-show  bg-gray-100">
   <?php include('../include/link.html'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../include/dashboardnav.html'); ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Attendence</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Classes Held</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Classes Attended</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Percentage</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php            
                      $query="select * from monthlyattn where ST_NO='4MW19CS063'";
                                    $run=mysqli_query($conn,$query);
                                    while ($row=mysqli_fetch_array($run)) { ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?php echo $row['SUB_CODE'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo $row['MnthlyTotClasses'] ?></p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $row['MnthlyTotAttended'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold"><?php echo $row['ATTNPER'] ?>%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
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