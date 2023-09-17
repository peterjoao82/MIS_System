<?php
session_start();
if (!$_SESSION["user_id"]) {
    header('location: ../login/login.php');
}
require_once "../connection/connection.php";


$display = "Submit";
if (isset($_POST['done'])) {

    // $user_id=$_SESSION['user_id'];
    // 							$query="SELECT DISTINCT sm.ST_NO as USN, e.FNAME as ename FROM studentmaster sm, employee e WHERE sm.ST_NO='$user_id' and sm.FAC_ADVISOR = e.EMP_NO";
    // 							$run=mysqli_query($conn,$query);
    // 							while ($row=mysqli_fetch_array($run)) {
    //                                 $fac_name=$row['ename'];
    //                                 $stu_usn=$row['USN'];}
    $STusn = $_POST['usn'];
    $sname = $_POST['name'];
    $semail = $_POST['email'];
    $ssubject = $_POST['subject'];
    $sfile = $_POST['files'];
    $apiKey = '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';

    // Set the API endpoint
    $apiEndpoint = 'https://api.sendinblue.com/v3/smtp/email';

    // Set the email parameters
    $emailData = array(
        'sender' => array('name' => 'Leave Application', 'email' => 'no-reply@oneshorts.in'),
        'to' => array(array('email' => 'peterjoao19@gmail.com')),
        'subject' => 'Leave application from '.$sname,
        'htmlContent' => '<h2>This is a Leave Application mail being sent to you for prior information of leave along with dates and documents pertaining the same.</h2><br>' . $sname . '<br>' . $STusn . '<br>' . $semail . '<br>' . $ssubject . '<br>' . $sent . '<br>'
    );

    // Prepare the attachment
    $attachment = array(
        'url' => 'cid:'.$sfile, // Use "cid" as a reference
        'name' => $sfile,
    );

    // Combine the email data with attachment
    $emailData['attachments'] = array($attachment);
    // Convert data to JSON
    $data = json_encode($emailData);

    // Set the HTTP headers
    $headers = array(
        'Content-Type: application/json',
        'api-key: ' . $apiKey
    );

    // Initialize cURL session
    $ch = curl_init($apiEndpoint);

    // Set cURL options
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Process the response
    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
    } else {
        $responseData = json_decode($response, true);
        if (isset($responseData['messageId'])) {
            header("Location: ./dashboard.php");
        } else {
            $display = "Email sending failed. ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../include/header.php'); ?>
<style>
    .text-middle-align {
        text-align: center;
        align-items: center;
        justify-content: center;
    }

    input {
        margin: 0.8% 1%;
        border-radius: 10px;
        color: #580004;
        border-color: #580004;
    }

    .submit {
        border-radius: 10px;
        color: #580004;
        border-color: #580004;
    }
</style>

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
                        <form action="leave.php" method="POST" enctype="multipart/form-data">
                            <div class="text-middle-align">
                                <div class="sidenav-header">
                                    <img src="../assets/img/smvitmlo.jpg" class="navbar-brand-img h-100" alt="main_logo">
                                </div>


                                <form method="post" action="emailBuilder.php" enctype="multipart/formdata">
                                    <?php $Student_USN = $_SESSION['user_id'];
                                    $query = "SELECT FNAME,StCollegeEMail FROM studentmaster WHERE ST_NO='$Student_USN'";
                                    $run = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($run)) {
                                        $fname = $row['FNAME'];

                                        $femail = $row['StCollegeEMail'];

                                        echo 'Name: ' . '<input type="text" name="name" value="' . $fname . '" readonly>';
                                        echo '<br>';
                                        echo 'USN: ' . '<input type="text" name="usn" value="' . $Student_USN . '" readonly>';
                                        echo '<br>';
                                        echo 'Email: ' . '<input type="email" name="email" value="' . $femail . '"readonly>';
                                        echo '<br>';
                                    } ?>
                                    <label class="font" for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" required>
                                    <br>
                                    <label class="font" for="file">Upload File</label>
                                    <input type="file" accept="file" name="files" />

                                    <br>
                                    <br>
                                    <input class="submit" type="submit" value=" <?php echo $display; ?>" name="done" />

                                </form>

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