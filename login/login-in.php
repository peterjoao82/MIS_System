
<?php 
session_start();
    require_once "../connection/connection.php"; 
    
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["usn"]; 
        $password=$_POST["usnpassword"];  
        $query="select ST_NO,PASSWD from studentmaster where ST_NO='$username' and PASSWD='$password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["ST_NO"]=="$username")
                {
                    $_SESSION[$username]=$row['ST_NO'];
                    header('Location: ../pages/dashboard.php');
                }
            }
        }
        else
        { 
            // $message="USN Or Password Does Not Match";
            header("Location: login-in.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

 <?php include('../include/header.php'); ?>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../index.html">
        MIS - Welcome SMVITM Student Interface System
      </a>
      
          
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
              <p class="text-lead text-white">Use this forms to login.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Login</h5>
              </div>
              
              <div class="card-body">
                <form role="form text-left" method="post" action="login-in.php">
                 <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Uinversity Seat Number" aria-label="Email" name="usn" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="usnpassword" aria-describedby="password-addon">
                  </div>
                  <!-- <?php echo $message; ?> -->
                  <div class="text-center">
                    <button type="button" name="btnlogin" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign in</button>
                  </div>
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
     <?php include('../include/footer.html'); ?>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
 
</body>

</html>