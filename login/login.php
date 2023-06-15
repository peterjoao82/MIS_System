<?php 
session_start();
    require_once "../connection/connection.php"; 
    
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["usn"]; 
        $password=$_POST["usnpassword"];  
        $query="select * from studentmaster where ST_NO='$username' and PASSWD='$password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["ST_NO"]=="4MW20CS055")
                {
                    $_SESSION['Student']=$row['ST_NO'];
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