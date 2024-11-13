<?php 
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selQry = "select * from tbl_farmer where farmer_id =".$_SESSION["fid"];
$result = $Con -> query($selQry);
$data = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-5">Farmer Profile</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <!-- Profile Image -->
                        <img src="../Assets/Files/UserDocs/image2.jpg" class="rounded-circle mb-4" alt="Farmer Photo" style="width: 150px; height: 150px; object-fit: cover;">

                        <!-- Profile Information -->
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><?php echo $data["farmer_name"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo $data["farmer_email"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td><?php echo $data["farmer_address"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Contact</th>
                                    <td><?php echo $data["farmer_contact"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional for dynamic components) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
<?php
    include("Foot.php");
    ob_flush();
?>
</html>
