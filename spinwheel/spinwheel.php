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
                <?php
$db = new mysqli("localhost","root","","spin_the_wheel");
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}

if ($result = $db -> query("SELECT * FROM prizes_list WHERE prize_status = 'ACTIVE'")) { 
?>
                <ul>
                    <?php 
		foreach($result as $row){
			$prize = $row['prize_code'];
			$sql_winner= "SELECT * FROM winners_table where prize_name = '$prize'";
			$result_winner = $db->query($sql_winner);                       
			$num_rows_winner = mysqli_num_rows($result_winner);
			if($num_rows_winner < 1 OR $num_rows_winner < $row['prize_number']){
			$remaining_count = $row['prize_number'] - $num_rows_winner;
	?>
                    <li id="<?= $row['prize_name'] ?>prize">

                        <button style="font-size: 13px;" class="button-33 prize-button"
                            data-prize="<?=$row['prize_code']?>"><?=$row['prize_name']?>
                            (<?=$remaining_count;?>)</button>
                    </li>
                    <?php 	} 
		}?>
                </ul>
                <?php
  $result -> free_result();
}
?>
            </div>
        </div>
        <div class="section2">
            <div id="arrow" style=" z-index: 999;"><img class="arrow_img" src="img/arrow.webp" alt=""
                    style="width: 80px; height: 50px; margin-bottom:-190px; ">
            </div>
            <div class="container" id="wheel"></div>
            <img id="spin" src="img\spinarroW.png" alt="">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>

    <button><a href="winners_list.php" class="bottom-left">Winners List</a></button>
</body>

</html>