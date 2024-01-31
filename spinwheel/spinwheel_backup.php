<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin Wheel</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="section1">
            <div class="title" style="text-align: center;">
                <h1 id="h1">RAFFLE PRIZES</h1>
            </div>
            <div class="prizes" id="prizes">
                <ul>
                    <?php
$db = new mysqli('localhost', 'root', '', 'spin_the_wheel');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT * FROM winners_table where prize_name = 'IPHONE 15'";
$result = $db->query($sql);                         
$num_rows_iphone = mysqli_num_rows($result);

$sql_airpods = "SELECT * FROM winners_table where prize_name = 'AIRPODS'";
$result_airpods = $db->query($sql_airpods);                       
$num_rows_airpods = mysqli_num_rows($result_airpods);

$sql_nespresso = "SELECT * FROM winners_table where prize_name = 'NESPRESSO MACHINE'";
$result_nespresso = $db->query($sql_nespresso);                       
$num_rows_nespresso = mysqli_num_rows($result_nespresso);

$sql_icemaker = "SELECT * FROM winners_table where prize_name = 'ICE MAKER'";
$result_icemaker = $db->query($sql_icemaker);                       
$num_rows_icemaker = mysqli_num_rows($result_icemaker);

$sql_gas = "SELECT * FROM winners_table where prize_name = '3K GAS VOUCHER'";
$result_gas = $db->query($sql_gas);                       
$num_rows_gas = mysqli_num_rows($result_gas);

$sql_bluetooth = "SELECT * FROM winners_table where prize_name = 'BLUETOOTH SPEAKER'";
$result_bluetooth = $db->query($sql_bluetooth);                       
$num_rows_bluetooth = mysqli_num_rows($result_bluetooth);

$sql_gift = "SELECT * FROM winners_table where prize_name = 'GIFT CERTIFICATE'";
$result_gift = $db->query($sql_gift);                       
$num_rows_gift = mysqli_num_rows($result_gift);

$sql_samsung = "SELECT * FROM winners_table where prize_name = 'SAMSUNG GALAXY'";
$result_samsung = $db->query($sql_samsung);                       
$num_rows_samsung = mysqli_num_rows($result_samsung);

$sql_instax = "SELECT * FROM winners_table where prize_name = 'INSTAX'";
$result_instax = $db->query($sql_instax);                       
$num_rows_instax = mysqli_num_rows($result_instax);

$sql_aguila = "SELECT * FROM winners_table where prize_name = 'AGUILA GLASS'";
$result_aguila = $db->query($sql_aguila);                       
$num_rows_aguila = mysqli_num_rows($result_aguila);
                    
if($num_rows_iphone < 1){
?>
                    <li id="prizeIphone">
                        <img src="img/iphone-image.png" alt="iPhone 15 Image">
                        <button class="button prize-button" data-prize="Iphone 15">Iphone 15</button>
                    </li>
                    <?php
}
if($num_rows_airpods < 1){
?>
                    <li id="prizeAirpods">
                        <img src="img/airpods.png" alt="Airpods Image">
                        <button class="button prize-button" data-prize="Airpods">Airpods (2nd Gen)</button>
                    </li>
                    <?php
}
if($num_rows_nespresso < 1){
?>
                    <li id="prizeNespresso">
                        <img src="img/nespresso.png" alt="Nespresso Image">
                        <button class="button prize-button" data-prize="Nespresso Machine">Nespresso Machine</button>
                    </li>
                    <?php
}
if($num_rows_icemaker < 1){
?>
                    <li id="IceMakerprize">
                        <img src="img/icemaker.png" alt="Image">
                        <button class="button prize-button" data-prize="Ice maker">Ice Maker</button>
                    </li>
                    <?php
}
if($num_rows_gas == 1 OR $num_rows_gas < 10){
    $remaining_count = 10 - $num_rows_gas;
?>
                    <li id="3kgasprize">
                        <img src="img/voucher.png" alt="Image">
                        <button class="button prize-button" data-prize="3k Gas voucher">3K Gas Voucher from Caltex (<?=$remaining_count;?>)</button>
                    </li>
                    <?php
}
if($num_rows_bluetooth == 1 OR $num_rows_bluetooth <9){
    $remaining_count_bluetooth = 9 - $num_rows_bluetooth;
?>
                    <li id="BluetoothSpeakerprize">
                        <img src="img/bluetooth.png" alt="Image">
                        <button class="button prize-button" data-prize="Bluetooth Speaker">Bluetooth Speaker(<?=$remaining_count_bluetooth;?>)</button>
                    </li>
                    <?php
}
if($num_rows_gift == 1 OR $num_rows_gift < 20){
    $remaining_count_gift = 20 - $num_rows_gift;
?>
                    <li id="GiftCertificateprize">
                        <img src="img/gift.png" alt="Image">
                        <button class="button prize-button" data-prize="Gift Certificate">Gift Certificate(<?=$remaining_count_gift;?>)</button>
                    </li>
                    <?php
}
if($num_rows_samsung < 1){
?>
                    <li id="SamsungGalaxyprize">
                        <img src="img/samsung.webp" alt="Image">
                        <button class="button prize-button" data-prize="Samsung Galaxy">Samsung Galaxy A24</button>
                    </li>
                    <?php
}
if($num_rows_instax == 1 OR $num_rows_instax <5){
    $remaining_count_instax = 5 - $num_rows_instax;
?>
                    <li id="Instaxprize">
                        <img src="img/instax.png" alt="Image">
                        <button class="button prize-button" data-prize="Instax">Instax(<?=$remaining_count_instax;?>)</button>
                    </li>
                    <?php
}
if($num_rows_aguila < 1 OR $num_rows_aguila <2){
    $remaining_count_aguila = 2 - $num_rows_aguila;
?>
                    <li id="Aguilaprize">
                        <img src="img/voucher.png" alt="Image">
                        <button class="button prize-button" data-prize="Aguila Glass">Aguila Auto Glass Gift Voucher(<?=$remaining_count_aguila;?>)</button>
                    </li>
                    <?php
}
 ?>
                </ul>
                <ul>
<?php
$db = new mysqli('localhost', 'root', '', 'spin_the_wheel');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql ="SELECT * FROM prizes_list WHERE prize_status = 'ACTIVE' ";
$result = $db->query($sql);

if (!$result) {
    die("Query failed: " . $db->error);
}

$prizes = $result->fetch_all(MYSQLI_ASSOC);
?>

<ul>
    <?php foreach ($prizes as $prize): ?>
        <li id="<?=$prize['prize_name']?>prize">
            <img src="img/iphone.png" alt="Image">
            <button class="button prize-button" data-prize="<?=$prize['prize_name']?>"><?=$prize['prize_name']?></button>
        </li>
    <?php endforeach; ?>
</ul>

            </div>
        </div>
        <div class="section2">
            <div id="arrow" style=" z-index: 999;"><img class="arrow_img" src="img/arrow.webp" alt=""
                    style="width: 150px; height: 100px; margin-bottom:-50px; ">
            </div>
            <div class="container" id="wheel"></div>
            <img id="spin" src="img\spinarroW.png" alt="">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <a href="winners_list.php" class="bottom-left">Winners List</a>
</body>

</html>