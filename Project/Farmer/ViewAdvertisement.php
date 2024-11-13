<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_GET['reqid'])) {
    $upQry = "UPDATE tbl_advertisement SET adv_status = '1', farmer_id = '" . $_SESSION['fid'] . "' WHERE adv_id =" . $_GET['reqid'];
    if ($Con->query($upQry)) {
        echo "<script>alert('Requested'); window.location = 'HomePage.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Advertisement</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
<div class="container my-5">
    <h1 class="text-center mb-4">View Advertisements</h1>

    <!-- Advertisements Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $selQry = "SELECT * FROM tbl_advertisement";
            $result = $Con->query($selQry);
            while ($data = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><img src="../Assets/Files/UserDocs/<?php echo $data['adv_photo']; ?>" class="img-thumbnail" width="100" height="100"></td>
                    <td><?php echo $data['adv_discription']; ?></td>
                    <td><a href="ViewAdvertisement.php?reqid=<?php echo $data['adv_id']; ?>" class="btn btn-primary">Request</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

<?php
include("Foot.php");
ob_flush();
?>
</html>
