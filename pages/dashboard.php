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

<?php include('../include/header.php');  ?>

<body class="g-sidenav-show  bg-gray-100">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="background-image: url('../assets/img/curved-images/white-curved.jpg');padding:2% 2%">
    <!-- Navbar -->
    <br>
    <br>
    <br>
    <br>
   <?php include('../include/dashboardnav.php'); ?>
    <!-- End Navbar -->
    <br><br>
   <?php include('../include/progress.php');?>
     
<br><br>
   <?php include('../include/content.php');?>

  </main>
 
  <?php include('../include/footer.html'); ?>
</body>

</html>