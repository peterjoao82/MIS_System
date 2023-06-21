<?php
// Always start this first
session_start();
require_once "../connection/connection.php"; 
if ( ! empty( $_POST ) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        
        $stmt = $conn->prepare("select * from studentmaster where ST_NO='$username' and PASSWD='$password'");
        // $stmt->bind_param('s', $_POST['ST_NO']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
        // if ($row["Role"]=="X") {
        //     # code...
        // }
         $_SESSION['user_id'] = $user->ST_NO;
    	// Verify user password and set $_SESSION
    	// if ( password_verify( $_POST['PASSWD'], $user->PASSWD ) ) {
    	// 	$_SESSION['user_id'] = $user->ST_NO;
    	// }
       
        if ( isset( $_SESSION['user_id'] ) ) {
           
            header("Location: ../pages/dashboard.php");
        } else {
            $error = "Invalid email or password";
        }
    }
}
?>