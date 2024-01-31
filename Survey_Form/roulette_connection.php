<?php
$db = new mysqli('localhost', 'root', '', 'survey');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$names = array();

$result = $db->query("SELECT * FROM survey_prizes WHERE prize_status = 'ACTIVE'");

while ($row = $result->fetch_assoc()) {
    $names[] = $row['name'];
}

header('Content-Type: application/json');
echo json_encode($names);

$db->close();
?>