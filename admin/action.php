<?php
$conn = mysqli_connect("localhost","root","","test") or die(mysqli_error($conn));
$cate = $_POST["cate"];
$sql = "SELECT * FROM `sub_category` WHERE category_name='$cate' ORDER BY sub_category_name";
$result = mysqli_query($conn, $sql);
$str = '';
while ($row = mysqli_fetch_array($result)) {
    $str .= "<option value='$row[id]'>".$row["sub_category_name"]."</option>";
}
echo $str;
?>