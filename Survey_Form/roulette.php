<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin Wheel</title>
    <link href="https://fonts.cdnfonts.com/css/infinite-justice" rel="stylesheet">
    <link rel="icon" href="img\logo.png" type="image/png">
    <link rel="stylesheet" href="roulette.css">
</head>
<body>
    <?php
$sn = base64_decode($_GET['survey_number']);

include_once('connection.php');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM survey_form WHERE survey_number = '$sn'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $membershipStatus =$row["statuss"];

    if ($row['status'] == 'complete') {
        $none = 'none';
    } else {
        $none = '';
    }
    
    if ($row['statuss'] == 'no') {
        $modalDisplay = 'none';
    } else if ($row['statuss'] == 'yes') {
        $spinWheelDisplay = 'none';
    }
?>
    <div class="section2" style="display: <?php echo $spinWheelDisplay; ?>">
        <h1><span class="aap">AAP</span> New Member Survey</h1>
            <div id="arrow">
                <img class="arrow_img" src="img/arrow.webp" alt="" style="width: 80px; height: 50px;">
            </div>
        <div class="container" id="wheel"></div>
        <img id="spin" src="img/spinarroW.png" style="z-index: 999; display: <?php echo $none; ?>">
    </div>
    <div class="center-container">
        <div class="flip-card" style="display: <?php echo $modalDisplay; ?>">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title"><span class="aap">AAP</span> Member</p>
                    <p style="font-size: 2rem">Hover Me!👀</p>
                </div>
                <div class="flip-card-back">
                    <h1 id="congrats">Congratulations!🎉</h1>
                    <p id="p">Claim your Special AAP gift at your nearest AAP Branch.</p>
                    <h2 id="welcome">Welcome back, <span class="aap">AAP</span> Member!</h2>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const wheel = document.getElementById("wheel");
const spinButton = document.getElementById("spin");
const arrow = document.getElementById("arrow");
let container = document.querySelector(".container");
let btn = document.getElementById("spin");
let isSpinning = false;
let currentTotalRotation = 0;
let logicalRotation = 0;
let visualRotation = 0;
let slicesData = [];
let dataLength;

btn.addEventListener('click', function() {

    if (!isSpinning && slicesData.length) {
        isSpinning = true;

        const randomRotation = Math.floor(Math.random() * 360);
        logicalRotation = (logicalRotation + randomRotation) % 360;
        visualRotation += 360 * 100 + randomRotation;

        container.style.transform = `rotate(${visualRotation}deg)`;
        container.offsetWidth;
        container.style.transition = "transform 2s ease-in-out";
        container.addEventListener('transitionend', function determineResult() {
            isSpinning = false;

            const finalDegree = logicalRotation % 360;
            const adjustedDegree = (360 - finalDegree) % 360;
            const resultSliceIndex = Math.floor(adjustedDegree / (360 / slicesData.length));

            console.log(`The wheel stopped on slice index: ${resultSliceIndex}`);
            console.log(`The wheel stopped on the name: ${slicesData[resultSliceIndex]}`);

            setTimeout(() => {
                Swal.fire({
                    title: `<strong style="color:blue;">Congratulations!</strong>`,
                    html: `<div>Enjoy <strong style="color:green;">${slicesData[resultSliceIndex]}</strong> on your AAP Membership Fee</br></br>For Walk-in: Please present the code to our staff.</br>For Online: Enter the code on the last part of the application form.</br></br><strong style="color:blue;">Welcome to the National Auto Club!</div> `,
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        sendSliceDataToServer(slicesData[resultSliceIndex]);
                        location.reload();
                    }
                });
                container.removeEventListener('transitionend', determineResult);
            });
        });
    }
});

function fetchNames() {
    fetch('roulette_connection.php')
        .then(response => response.json())
        .then(data => {
            console.log("Number of Slices: " + data.length);
            slicesData = data;

            container.innerHTML = '';

            const angleIncrement = 360 / data.length;

            data.forEach((name, index) => {
                const slice = document.createElement('div');
                slice.className = 'slice' + (index % 2 === 0 ? "blue" : "yellow");

                const rotationAngle = angleIncrement * index;
                slice.style.transform = `rotate(${rotationAngle}deg)`;
                container.appendChild(slice);

                const textContainer = document.createElement('div');
                textContainer.className = 'text-container';
                textContainer.textContent = name;

                slice.appendChild(textContainer);
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

document.addEventListener('DOMContentLoaded', fetchNames);

function sendSliceDataToServer(selectedSliceData) {

    const xhr = new XMLHttpRequest();
    const url = 'insert.php';

    xhr.open('POST', 'insert.php?survey_number=<?php echo $sn; ?>', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    const data = `selectedSliceData=${encodeURIComponent(selectedSliceData)}`;
    console.log('Data to be sent:', selectedSliceData);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            console.log('Response:', xhr.responseText);
            if (xhr.status === 200) {
                console.log('Data sent successfully!');
            } else {
                console.error('Error sending data. Status:', xhr.status);
            }
        }
    }
    console.log('Sending data:', data);
    xhr.send(data);
};
    </script>
</body>

</html>