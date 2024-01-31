<?php
include_once("connection.php");

if (isset($_POST['selectedSliceData']) && isset($_GET['survey_number'])) {
    $selectedSliceData = $_POST['selectedSliceData'];
    $sn = $_GET['survey_number'];

    $updateQuery = $db->prepare("UPDATE survey_form SET result = ?, `status` = 'complete' WHERE survey_number = ?");
    $updateQuery->bind_param('ss', $selectedSliceData, $sn);
    $updateQuery->execute();
}

if (isset($_POST['submit'])) {
    $sn = $_POST["sn"];
    $userEmail = filter_var($_POST['Uemail'], FILTER_VALIDATE_EMAIL);

    $checkEmailQuery = $db->prepare("SELECT COUNT(*) FROM survey_form WHERE email = ?");
    $checkEmailQuery->bind_param('s', $userEmail);
    $checkEmailQuery->execute();
    $checkEmailQuery->bind_result($emailCount);
    $checkEmailQuery->fetch();
    $checkEmailQuery->close();

    if ($emailCount > 0) {
        echo '<script>
                alert("Email already exists. Please use a different email address.");
                window.location = "surveyForm.php"; // Redirect or perform any other action
              </script>';
        exit();
    }
    $statuss = $_POST["memberStatus"];
    if (isset($_POST['preferences']) && is_array($_POST['preferences']) && !empty($_POST['preferences'])) {
        $heard = implode(', ', $_POST['preferences']);
    } else {
        $heard = '';
    }
    $motivate = $_POST['motivation'];
    $volunteering = $_POST['volunteer'];
    $recommendation = $_POST['localityRecommendation'];
    $rating = $_POST['likert'];

    $insertQuery = $db->prepare("INSERT INTO survey_form (survey_number, email, statuss, heard, motivate, volunteering, recommendation, rating) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insertQuery->bind_param('ssssssss', $sn, $userEmail, $statuss, $heard, $motivate, $volunteering, $recommendation, $rating);

    $insertQuery->execute();
}

sleep(1);
$sn = base64_encode($sn);
header("Location: roulette.php?survey_number=" . $sn);

?>
