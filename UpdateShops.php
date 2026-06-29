<?php
include 'db_connect.php';

$updatedata = file_get_contents("php://input");
$json_data = json_decode($updatedata, true);
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

$sql = "UPDATE Ration_Shop_Details SET name = '$name',area = '$area',address = '$address',owner = '$owner',phone = '$phone',open = '$open',
close = '$close',days = '$days' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>