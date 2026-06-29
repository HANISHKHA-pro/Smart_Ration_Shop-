<?php
include 'db_connect.php';
$deletedata_Schedules = file_get_contents("php://input");
$json_data = json_decode($deletedata_Schedules, true);
$id = $json_data['id'];

$sql = "DELETE FROM schedules WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>