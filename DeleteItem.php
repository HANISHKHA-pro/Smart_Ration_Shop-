<?php
include 'db_connect.php';
$itemid = file_get_contents("php://input");
$json_data = json_decode($itemid, true);
//$id = $json_data->id;
$id = $json_data['id'];
$sql = "DELETE FROM item_availability WHERE ID='$id'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
