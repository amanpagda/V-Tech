<?php 
$conn = mysqli_connect("localhost", "root", "", "test");

$id = $_POST["id"];
$sql = "SELECT * FROM `address` WHERE `id`=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$status = $row["status"];

if ($status == "1") {
    $status = "0";
}else{
    $status = "1";
}

$update = "UPDATE `address` SET `status` = '$status' WHERE `id` = '$id'";
$result = mysqli_query($conn, $update);
if($result){
    echo $status;
}

?>