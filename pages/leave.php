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
                            <h6>Leave Application</h6>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="text-middle-align">


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <?php include('../include/footer.html'); ?>
       
    </main>
</body>

</html>