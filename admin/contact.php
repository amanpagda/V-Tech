<?php
session_start();
include("db.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<?php

// insert query
if (isset($_POST["row_number"])) {
    $number = $_POST["number"];

    $sql = "INSERT INTO `contact`(`number`, `status`, `date`) VALUES ('$number', '1' ,current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Insert Successful');
        window.location.href = 'contact.php';
        </script>";
    } else {
        echo "<script>
        alert('Insert Error');
        window.location.href = 'contact.php';
        </script>";
    }
}

if (isset($_POST["row_email"])) {
    $email = $_POST["email"];

    $sql = "INSERT INTO `email`(`email`, `status`, `date`) VALUES ('$email', '1' ,current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Insert Successful');
        window.location.href = 'contact.php';
        </script>";
    } else {
        echo "<script>
        alert('Insert Error');
        window.location.href = 'contact.php';
        </script>";
    }
}

if (isset($_POST["row_address"])) {
    $address = $_POST["address"];

    $sql = "INSERT INTO `address`(`address`, `status`, `date`) VALUES ('$address', '1' ,current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Insert Successful');
        window.location.href = 'contact.php';
        </script>";
    } else {
        echo "<script>
        alert('Insert Error');
        window.location.href = 'contact.php';
        </script>";
    }
}

// delete query
if (isset($_POST['num_delete'])) {
    $id = $_POST['del_id'];

    $sql = "DELETE FROM `contact` WHERE id='$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
        alert('Delete Successfully');
        window.location.href = 'contact.php';        
        </script>";
    } else {
        echo "<script>
        alert('Delete Error....');
        window.location.href = 'contact.php';        
        </script>";
    }
}
if (isset($_POST['email_delete'])) {
    $id = $_POST['del_id'];

    $sql = "DELETE FROM `email` WHERE id='$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
        alert('Delete Successfully');
        window.location.href = 'contact.php';        
        </script>";
    } else {
        echo "<script>
        alert('Delete Error....');
        window.location.href = 'contact.php';        
        </script>";
    }
}
if (isset($_POST['add_delete'])) {
    $id = $_POST['del_id'];

    $sql = "DELETE FROM `address` WHERE id='$id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>
        alert('Delete Successfully');
        window.location.href = 'contact.php';        
        </script>";
    } else {
        echo "<script>
        alert('Delete Error....');
        window.location.href = 'contact.php';        
        </script>";
    }
}

?>

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Dashboard | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/svg/logo.html" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <?php include("sidebar.php"); ?>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <?php include("header.php"); ?>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    <h2 class="main-title">UPDATE CONTACT DETAILS</h2>
                    <div class="row">
                        <!-- form start -->
                        <!-- number start -->
                        <div class="container-fluid bg-white rounded mt-3">
                            <form action="contact.php" method="post" class="my-3">
                                <input type="hidden" name="id">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input class="form-control" name="number" type="number" placeholder="+ 91">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="row_number" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                </div>
                            </form>
                        </div>

                        <!-- number end -->

                        <!-- email start -->
                        <div class="container-fluid bg-white rounded mt-3">
                            <form action="contact.php" method="post" class="my-3">
                                <input type="hidden" name="id">
                                <div class="mb-3">
                                    <label class="form-label">Enter Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="row_email" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                </div>
                            </form>
                        </div>
                        <!-- email end -->

                        <!-- address start -->
                        <div class="container-fluid bg-white rounded mt-3">
                            <form action="contact.php" method="post" class="my-3">
                                <input type="hidden" name="id">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input class="form-control" name="address" type="text" placeholder="Address">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="row_address" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                                </div>
                            </form>
                        </div>
                        <!-- address end -->
                        <!-- form end -->

                        <!-- table start -->
                        <div class="row mt-4">
                            <!-- phone number -->
                            <div class="col-6 bg-white my-3">
                                <h5 class="fw-bold py-3">→ Phone Number</h5>
                                <table class="table table-dark table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">NUMBER</th>
                                            <th scope="col">STATUS</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `contact`";
                                        $result = mysqli_query($conn, $sql);
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i += 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row["number"]; ?></td>
                                                <td>
                                                    <div class="form-lg-check form-switch">
                                                        <input class="form-check-input" <?php if ($row["status"] == '1') {
                                                                                            echo "checked";
                                                                                        } ?> onclick="toggleStatus(<?php echo $row['id']; ?>)" type="checkbox" id="check">
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="<?php echo "num_edit.php?id=$row[id]" ?>" class="btn btn-primary" style="margin-right:5px;">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="contact.php" method="POST">
                                                        <input type="hidden" name="del_id" value="<?php echo $row["id"]; ?>">
                                                        <button type="submit" name="num_delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- email -->
                            <div class="col-6 bg-white my-3">
                                <h5 class="fw-bold py-3">→ Email</h5>
                                <table class="table table-dark table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">STATUS</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `email`";
                                        $result = mysqli_query($conn, $sql);
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i += 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td>
                                                    <div class="form-lg-check form-switch">
                                                        <input class="form-check-input" <?php if ($row["status"] == '1') {
                                                                                            echo "checked";
                                                                                        } ?> onclick="toggleStatus2(<?php echo $row['id']; ?>)" type="checkbox" id="check">
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="<?php echo "email_edit.php?id=$row[id]" ?>" class="btn btn-primary" style="margin-right:5px;">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="contact.php" method="POST">
                                                        <input type="hidden" name="del_id" value="<?php echo $row["id"]; ?>">
                                                        <button type="submit" name="email_delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- address -->
                        <div class="bg-white my-3">
                            <h5 class="fw-bold py-3">→ Address</h5>
                            <table class="table table-dark table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">ADDRESS</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `address`";
                                    $result = mysqli_query($conn, $sql);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $i += 1;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row["address"]; ?></td>
                                            <td>
                                                <div class="form-lg-check form-switch">
                                                    <input class="form-check-input" <?php if ($row["status"] == '1') {
                                                                                        echo "checked";
                                                                                    } ?> onclick="toggleStatus3(<?php echo $row['id']; ?>)" type="checkbox" id="check">
                                                </div>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="<?php echo "add_edit.php?id=$row[id]" ?>" class="btn btn-primary" style="margin-right:5px;">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="contact.php" method="POST">
                                                    <input type="hidden" name="del_id" value="<?php echo $row["id"]; ?>">
                                                    <button type="submit" name="add_delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table end -->


                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Chart library -->
    <script src="plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // for number
        function toggleStatus(id) {
            var id = id;
            $.ajax({
                url: "num_action.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(result) {
                    if (result == '1') {
                        alert('Number Successfuly On');
                    } else {
                        alert('Number Successfuly Off');
                    }
                }
            });
        }

        // for email
        function toggleStatus2(id) {
            var id = id;
            $.ajax({
                url: "email_action.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(result) {
                    if (result == '1') {
                        alert('Email Successfuly ON');
                    } else {
                        alert('Email Successfuly Off');
                    }
                }
            });
        }

        // for address
        function toggleStatus3(id) {
            var id = id;
            $.ajax({
                url: "address_action.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(result) {
                    if (result == '1') {
                        alert('Address Successfuly ON');
                    } else {
                        alert('Address Successfuly Off');
                    }
                }
            });
        }
    </script>
</body>


<!-- Mirrored from themewagon.github.io/elegant/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 06:57:20 GMT -->

</html>