<?php
include 'db_connect.php';

$updatedataitem = file_get_contents("php://input");
$json_data = json_decode($updatedataitem, true);
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



$sql = "UPDATE item_availability SET shopId ='$shopId', item= '$item', cardType= '$cardType',qty='$qty', Price= '$price', avail='$avail',updated='$updated' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>