<?php
include 'db_connect.php';
$announcementid = file_get_contents("php://input");
$json_data = json_decode($announcementid, true);
//$id = $json_data->id;
$id = $json_data['id'];
$sql = "DELETE FROM announcements WHERE ID='$id'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
