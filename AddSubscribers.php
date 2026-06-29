<?php
include 'db_connect.php';
echo "sdssdds  sds s sd";
$insertdataitem = file_get_contents("php://input");
$json_data = json_decode($insertdataitem, true);
echo "sdssdds  sds s sd" . $json_data;

$sql = "SELECT max(id) AS MaxCount FROM subscribers";
$result = $conn->query($sql);
$maxCount = 0;
if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $maxCount = $row['MaxCount'] + 1;
    //echo "The maximum count is: " . $max_count;
} else {
    $maxCount =  1;
}
$userName = $json_data['userName'];
$item =$json_data['item'];
$notifyVia = $json_data['notifyVia'];
$phone = $json_data['phone'];
$shopId =$json_data['shopId'];
echo "Phone " . $phone;

$sql = "INSERT INTO subscribers (id, userName, item, notifyVia, phone, shopId)
VALUES ($maxCount, '$userName', '$item', '$notifyVia', '$phone', '$shopId')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>