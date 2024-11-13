<?php 
session_start();
ob_start();
include("Head.php"); 
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_submit'])) {
    $name = $_POST['txt_category'];
    $insQry = "INSERT INTO tbl_category(category_name) VALUES('$name')";
    if($Con -> query($insQry)) {
?>
        <script>
        alert("Inserted");
        </script>
<?php
    }
}

if(isset($_GET['did'])) {
    $delQry = "DELETE FROM tbl_category WHERE category_id = ".$_GET['did'];
    if($Con -> query($delQry)) {
?>
        <script>
        alert("Deleted");
        window.location = "Category.php";
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
    <title>Category Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center mb-4">Manage Categories</h2>

    <!-- Form for Adding New Category -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4>Add New Category</h4>
        </div>
        <div class="card-body">
            <form id="form1" name="form1" method="post" action="">
                <div class="form-group">
                    <label for="txt_category">Category Name</label>
                    <input type="text" name="txt_category" id="txt_category" class="form-control" required/>
                </div>
                <div class="text-center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-success" />
                    <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" class="btn btn-danger" />
                </div>
            </form>
        </div>
    </div>

    <!-- Category List -->
    <h4 class="text-center mb-3">Category List</h4>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_category";
        $result = $Con->query($selQry);
        while($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['category_name']; ?></td>
                <td>
                    <a href="Category.php?did=<?php echo $data['category_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
