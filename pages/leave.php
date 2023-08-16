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
                                
                            <html>
<head>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <center> <h1 class="heading">Leave Application</h1></center>
   <br><br>
    <center>
    <form method="post" action="send-email.php"  enctype="multipart/formdata">
        <label class="font" for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <label class="font" for="email">Email</label>
        &nbsp
        <input type="email" name="email" id="email" required>
        <br><br>
        <label class="font" for="subject">Subject</label>
        <input type="text" name="subject" id="subject" required>
        <br><br>
        <label class="font" for="message">Upload File</label>
        <input type="file" accept="file"/>
        
        <br>
        <br>
        <button class="but">Send</button>
    </form>
    </center>
</body>
</html>

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