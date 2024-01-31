<?php
$db = new mysqli('localhost', 'root', '', 'spin_the_wheel');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$names = array();
$result = $db->query("SELECT name FROM aap_attendees WHERE status = 'CHECK IN' AND (raffle_status IS NULL OR raffle_status = '')");

while ($row = $result->fetch_assoc()) {
    $names[] = $row['name'];
}


// Return names as JSON
header('Content-Type: application/json');
echo json_encode($names);

$db->close();
?>
