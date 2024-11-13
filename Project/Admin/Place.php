<?php 
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_submit'])) {
    $placename = $_POST['txt_placename'];
    $district = $_POST['sel_district'];
    $insQry = "INSERT INTO tbl_place(place_name, district_id) VALUES('$placename', '$district')";
    if($Con -> query($insQry)) {
?>
        <script>
        alert("Inserted");
        window.location = "Place.php";
        </script>
<?php
    }
}

if(isset($_GET['did'])) {
    $delQry = "DELETE FROM tbl_place WHERE place_id = ".$_GET['did'];
    if($Con -> query($delQry)) {
?>
        <script>
        alert("Deleted");
        window.location = "Place.php";
        </script>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center mb-4">Manage Places</h2>

    <!-- Form for Adding New Place -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4>Add New Place</h4>
        </div>
        <div class="card-body">
            <form id="form1" name="form1" method="post" action="Place.php">
                <div class="form-group">
                    <label for="sel_district">District</label>
                    <select name="sel_district" id="sel_district" class="form-control" required>
                        <option value="">Select District</option>
                        <?php
                            $selQry = "SELECT * FROM tbl_district";
                            $result = $Con->query($selQry);
                            while($data = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data['district_id']; ?>"><?php echo $data['district_name']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="txt_placename">Place Name</label>
                    <input type="text" name="txt_placename" id="txt_placename" class="form-control" required/>
                </div>
                <div class="text-center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-success" />
                    <input type="reset" name="txt_cancel" id="txt_cancel" value="Cancel" class="btn btn-danger" />
                </div>
            </form>
        </div>
    </div>

    <!-- Place List -->
    <h4 class="text-center mb-3">Place List</h4>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>District</th>
                <th>Place</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON p.district_id = d.district_id";
        $result = $Con->query($selQry);
        while($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['district_name']; ?></td>
                <td><?php echo $data['place_name']; ?></td>
                <td>
                    <a href="Place.php?did=<?php echo $data['place_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
</br>
      </br>
<?php
include("Foot.php");
ob_flush();
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
