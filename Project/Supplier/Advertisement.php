<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if (isset($_POST['btn_submit'])) {
    $discription = $_POST['txt_discription'];
    $photo = $_FILES['file_photo']['name'];
    $tempPhoto = $_FILES['file_photo']['tmp_name'];
    move_uploaded_file($tempPhoto, "../Assets/Files/UserDocs/" . $photo);

    $insQry = "insert into tbl_advertisement(adv_discription,adv_photo,supplier_id) values('$discription','$photo','" . $_SESSION['sid'] . "')";
    if ($Con->query($insQry)) {
        echo "<script>alert('Advertisement inserted successfully!');</script>";
    }
}

if (isset($_GET['did'])) {
    $delQry = "delete from tbl_advertisement where adv_id = " . $_GET['did'];
    if ($Con->query($delQry)) {
        echo "<script>alert('Advertisement deleted!'); window.location='Advertisement.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement</title>
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">  -->
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Submit Advertisement</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="file_photo" class="form-label">Photo</label>
                            <input type="file" name="file_photo" id="file_photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="txt_discription" class="form-label">Description</label>
                            <textarea name="txt_discription" id="txt_discription" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="btn_submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h4 class="text-center">Submitted Advertisements</h4>
            <table class="table table-bordered table-striped">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Sl No</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $selQry = "select * from tbl_advertisement";
                    $result = $Con->query($selQry);
                    while ($data = $result->fetch_assoc()) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><img src="../Assets/Files/UserDocs/<?php echo $data['adv_photo']; ?>" class="img-thumbnail" width="70" height="70" alt="Advertisement Image"></td>
                        <td><?php echo $data['adv_discription']; ?></td>
                        <td><a href="Advertisement.php?did=<?php echo $data['adv_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getPlace(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
            success: function (result) {
                $("#sel_place").html(result);
            }
        });
    }
</script>

<?php
include("Foot.php");
ob_flush();
?>
</body>
</html>
