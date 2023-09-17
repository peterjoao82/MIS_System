 <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
   <div class="container-fluid pe-0">
     <div class="sidenav-header">
       <img src="../assets/img/smvitmlo.jpg" class="navbar-brand-img h-100" alt="main_logo">


     </div>

     <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="./dashboard.php">
       <h4 class="">&nbsp;&nbsp; <span><span><span><span><?php $Student_USN = $_SESSION['user_id'];
                                                          $query = "SELECT * FROM studentmaster WHERE ST_NO='$Student_USN'";
                                                          $run = mysqli_query($conn, $query);
                                                          while ($row = mysqli_fetch_array($run)) {
                                                            echo $row['FNAME'];
                                                          }
                                                          ?> </h4>
     </a>
     <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon mt-2">
         <span class="navbar-toggler-bar bar1"></span>
         <span class="navbar-toggler-bar bar2"></span>
         <span class="navbar-toggler-bar bar3"></span>
       </span>
     </button>
     <div class="collapse navbar-collapse" id="navigation">
       <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">

         <li class="nav-item">
           <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="./dashboard.php">
             Dashboard
           </a>
         </li>
         <li class="nav-item">
           <a class="nav-link  " href="../pages/attendence.php">

             <span class="nav-link-text ms-1">Attendence</span>
           </a>
         </li>
         <li class="nav-item">
           <a class="nav-link  " href="../pages/marks.php">

             <span class="nav-link-text ms-1">Marks</span>
           </a>
         </li>
         <li class="nav-item">
           <a class="nav-link  " href="../pages/leave.php">

             <span class="nav-link-text ms-1">Leave Application</span>
           </a>
         </li>

         <li class="nav-item">
           <a class="nav-link me-2" href="../pages/profile.php">
             <i class="fa fa-user opacity-6 text-dark me-1"></i>
             Profile
           </a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="../login/logout.php">
             <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
             Log Out
           </a>
         </li>

       </ul>

     </div>
   </div>
 </nav>