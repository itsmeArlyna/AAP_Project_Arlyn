<?php

$db = new mysqli('localhost', 'root', '', 'spin_the_wheel');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['winner']) && isset($_POST['prize'])) {
    $winnerName = $db->real_escape_string($_POST['winner']);
    $prize = strtoupper($db->real_escape_string($_POST['prize']));
    $raffleStatus = $prize . " WINNER";

    $stmtUpdate = $db->prepare("UPDATE aap_attendees SET raffle_status = ? WHERE name = ?");
    $stmtUpdate->bind_param("ss", $raffleStatus, $winnerName);

    if ($stmtUpdate->execute()) {
        echo "The winner's status has been updated successfully.";
    } else {
        echo "Error updating winner's status: " . $stmtUpdate->error;
    }

    $stmtUpdate->close();

    $stmtInsert = $db->prepare("INSERT INTO winners_table (winner_name, prize_name) VALUES (?, ?)");
    $stmtInsert->bind_param("ss", $winnerName, $prize);

    if ($stmtInsert->execute()) {
        echo "The winner has been added to the winners_table successfully.";
    } else {
        echo "Error inserting winner into winners_table: " . $stmtInsert->error;
    }

    $stmtInsert->close();
} else {
    echo "No winner name or prize provided.";
}

$db->close();
?>
