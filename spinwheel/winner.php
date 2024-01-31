<?php
$db = new mysqli('localhost', 'root', '', 'spin_the_wheel');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$winner = $_POST['winner'];
$prize = $_POST['prize'];

$sql = "INSERT INTO winners_table (winner_name, prize_name) VALUES ('$winner', '$prize')";

if ($db->query($sql) === TRUE) {
    $successMessage = "Winner updated successfully";
} else {
    $successMessage = "Error updating winner: " . $db->error;
}

// Fetch the entire table data
$query = "SELECT * FROM winners_table";
$result = $db->query($query);

if (!$result) {
    die("Query failed: " . $db->error);
}

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$db->close();

// Return data and success message as JSON
$response = array(
    'success' => $successMessage,
    'data' => $data
);

header('Content-Type: application/json');
echo json_encode($response);
?>
