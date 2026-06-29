<?php
include 'db_connect.php';

$insertdata_Schedules = file_get_contents("php://input");
$json_data = json_decode($insertdata_Schedules, true);

$id = $json_data['id'];
$shopId = $json_data['shopId'];
$date = $json_data['date'];
$type = $json_data['type'];
$description = $json_data['description'];

$sql = "INSERT INTO schedules (id, shopId, date, type, description) VALUES
('$id', '$shopId', '$date', '$type', '$description')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}
?>