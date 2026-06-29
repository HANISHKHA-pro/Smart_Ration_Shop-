<?php
include 'db_connect.php';

$insertdataitem = file_get_contents("php://input");
$json_data = json_decode($insertdataitem, true);
echo $json_data;
//$id = $json_data->id;
$id = $json_data['id'];
$shopId =$json_data['shopId'];
$item = $json_data['item'];
$cardType = $json_data['cardType'];
$qty =$json_data['qty'];
$price = $json_data['price'];
$avail =$json_data['avail'];
$updated = $json_data['updated'];

$sql = "INSERT INTO item_availability (id, shopId, item, cardType, qty, Price, avail, updated)
VALUES ('$id', '$shopId', '$item', '$cardType', '$qty', '$price', '$avail', '$updated')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>