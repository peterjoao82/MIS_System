
<?php  
	session_start();
	if (!$_SESSION["user_id"])
	{
		header('location: ../login/login.php');
	}
		require_once "../connection/connection.php";
		
	?>
<!DOCTYPE html>
<html lang="en">
 <?php include('../include/header.php'); ?>


<body class="g-sidenav-show  bg-gray-100">
   <?php include('../include/link.html'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../include/dashboardnav.php'); ?>
    <br><br><br><br>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Marks table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center" >SUB CODE</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">SUB NAME</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" text-align="center">AVERAGE</th>
                      <th></th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                            
                            $obtain_marks=0;
            
                             //  $roll_no=$_SESSION['user_id'];
                                $query="SELECT m.ST_NO,m.SUB_CODE ,s.SUB_NAME, AVG(m.IA_1+m.IA_2+m.IA_3) as mm FROM marks m, subject s WHERE m.SUB_CODE=s.SUB_CODE AND m.ST_NO='4MW20CS001' GROUP by s.SUB_CODE";
                                $run=mysqli_query($conn,$query);
                                while ($row=mysqli_fetch_array($run)) { 
                                  ?>
                                    <tr >
                                        <td><?php echo $row['SUB_CODE'] ?></td>
                                        <td><?php echo $row['SUB_NAME'] ?></td>                                       
                                        <td><?php echo $row['mm'] ?></td>
                                
                        
                                    </tr>
                                <?php
                                    
                                }
                            ?>

                
                  
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