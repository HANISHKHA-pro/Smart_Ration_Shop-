<?php
include 'db_connect.php';

$insertdata = file_get_contents("php://input");
$json_data = json_decode($insertdata, true);
//$id = $json_data->id;
$id = $json_data['id'];
$name =$json_data['name'];
$area = $json_data['area'];
$address = $json_data['address'];
$owner =$json_data['owner'];
$phone = $json_data['phone'];
$open =$json_data['open'];
$close = $json_data['close'];
$days = $json_data['days'];

$sql = "INSERT INTO Ration_Shop_Details (id, name, area, address, owner, phone, open, close, days) VALUES
('$id', '$name', '$area', '$address', '$owner', '$phone', '$open', '$close', '$days')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>