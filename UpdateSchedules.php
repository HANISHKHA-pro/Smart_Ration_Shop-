<?php
include 'db_connect.php';
$updatedata_schedules = file_get_contents("php://input");
$json_data = json_decode($updatedata_schedules, true);

//echo $json_data;
$id = $json_data['id'];
$shopId = $json_data['shopId'];
$date = $json_data['date'];
$type = $json_data['type'];
$description = $json_data['description'];

$sql = "UPDATE schedules SET shopId = '$shopId',date = '$date',type = '$type',description = '$description' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>