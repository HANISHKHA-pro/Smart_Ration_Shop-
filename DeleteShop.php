<?php
include 'db_connect.php';
$shopid = file_get_contents("php://input");
$json_data = json_decode($shopid, true);
//$id = $json_data->id;
$id = $json_data['id'];
$sql = "DELETE FROM Ration_Shop_Details WHERE ID='$id'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
