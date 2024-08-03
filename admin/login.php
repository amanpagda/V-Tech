<?php

session_start();
include("db.php");

if (isset($_POST["login_submit"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `admin` WHERE `name`='$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $verify = password_verify($password, $data["password"]);
        if ($verify == 1) {
            if (!empty($data)) {

                $_SESSION["role"] = $data["role"];
                $_SESSION["name"] = $data["name"];

                header("location: index1.php");
            }
        } else {
            echo "<script>
                  alert('try Again');
                  </script>";
        }
    }


}