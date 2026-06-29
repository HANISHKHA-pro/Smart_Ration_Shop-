<?php
include 'db_connect.php';

$updatedata_announcements = file_get_contents("php://input");
$json_data = json_decode($updatedata_announcements, true);
echo $json_data;
//$id = $json_data->id;
$id = $json_data['id'];
$title =$json_data['title'];
$source = $json_data['source'];
$date = $json_data['date'];
$priority=$json_data['priority'];
$message= $json_data['message'];

$sql = "UPDATE announcements SET title = '$title',source = '$source',date = '$date',priority = '$priority',message = '$message' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>