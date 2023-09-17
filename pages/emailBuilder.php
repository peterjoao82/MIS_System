<?php
session_start();
if (!$_SESSION["user_id"]) {
    header('location: ../login/login.php');
}
require_once "../connection/connection.php";
$roll_no = $_SESSION['user_id'];
$namequery = "select FNAME from studentmaster where ST_NO='$roll_no'";
$res = mysqli_query($conn, $namequery);
$row = mysqli_fetch_array($res);
$name = $row['FNAME'];
$n = 0;
?>
<?php
if (isset($_POST['submit_rating'])) {
    $n++;
    $rating = $_POST['phprating'];
    $feedback = $_POST['feedtxt'];
    $apiKey = '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';

    // Set the API endpoint
    $apiEndpoint = 'https://api.sendinblue.com/v3/smtp/email';

    // Set the email parameters
    $emailData = array(
        'sender' => array('name' => 'Feedback on SMIS', 'email' => 'no-reply@oneshorts.in'),
        'to' => array(array('email' => 'peterjoao19@gmail.com')),
        'subject' => 'Feedback',
        'htmlContent' => '<h4>This is a feedback email.</h4><br>' . $rating . '<br>' . $feedback . '<br>'
    );

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
            // $display= "Email sent successfully. ";
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

<link rel="stylesheet" type="text/css" href="../assets/css/rating_star.css">
<script type="text/javascript">
    function change(id) {
        var cname = document.getElementById(id).className;
        var ab = document.getElementById(id + "_hidden").value;
        document.getElementById(cname + "rating").value = ab;
        //var t=document.getElementById(cname+"rating").value;
        //document.write(t);

        for (var i = ab; i >= 1; i--) {
            document.getElementById(cname + i).src = "../assets/img/star2.jpg";
        }
        var id = parseInt(ab) + 1;
        for (var j = id; j <= 5; j++) {
            document.getElementById(cname + j).src = "../assets/img/star1.jpg";
        }
    }
</script>

<body class="g-sidenav-show  bg-gray-100">
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
                            <h6>ADD FEEDBACK</h6>
                        </div>

                        <form method="post" action="emailBuilder.php">
                            <div class="div">
                                <input type="hidden" id="php1_hidden" value="1">
                                <img src="../assets/img/star1.jpg" onmouseover="change(this.id);" id="php1" class="php">
                                <input type="hidden" id="php2_hidden" value="2">
                                <img src="../assets/img/star1.jpg" onmouseover="change(this.id);" id="php2" class="php">
                                <input type="hidden" id="php3_hidden" value="3">
                                <img src="../assets/img/star1.jpg" onmouseover="change(this.id);" id="php3" class="php">
                                <input type="hidden" id="php4_hidden" value="4">
                                <img src="../assets/img/star1.jpg" onmouseover="change(this.id);" id="php4" class="php">
                                <input type="hidden" id="php5_hidden" value="5">
                                <img src="../assets/img/star1.jpg" onmouseover="change(this.id);" id="php5" class="php">
                            </div>
                            </br>
                            <textarea name="feedtxt" rows="5" cols="10" wrap="soft" placeholder="Enter Feedback"></textarea>

                            <input type="hidden" name="phprating" id="phprating" value="0">

                            <input type="submit" value="submit" name="submit_rating">

                            <?php
                            echo $display;
                            ?>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('../include/footer.html'); ?>
</body>

</html>