<?php 
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_submit'])) {
    $subcategoryname = $_POST['txt_subname'];
    $category = $_POST['sel_category'];
    $insQry = "INSERT INTO tbl_subcategory(subcategory_name, category_id) VALUES('$subcategoryname', '$category')";
    if($Con->query($insQry)) {
?>
        <script>
        alert("Inserted");
        </script>
<?php
    }
}

if(isset($_GET['did'])) {
    $delQry = "DELETE FROM tbl_subcategory WHERE subcategory_id = " . $_GET['did'];
    if($Con->query($delQry)) {
?>
        <script>
        alert("Deleted");
        window.location = "Subcategory.php";
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
    <title>Manage Subcategories</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center mb-4">Manage Subcategories</h2>

    <!-- Form to Add New Subcategory -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4>Add New Subcategory</h4>
        </div>
        <div class="card-body">
            <form id="form1" name="form1" method="post" action="">
                <div class="form-group">
                    <label for="sel_category">Category</label>
                    <select name="sel_category" id="sel_category" class="form-control" required>
                        <option value="">Select Category</option>
                        <?php
                        $selQry = "SELECT * FROM tbl_category";
                        $result = $Con->query($selQry);
                        while($data = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data['category_id']; ?>"><?php echo $data['category_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="txt_subname">Subcategory</label>
                    <input type="text" name="txt_subname" id="txt_subname" class="form-control" required/>
                </div>

                <div class="text-center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-success" />
                    <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" class="btn btn-danger" />
                </div>
            </form>
        </div>
    </div>

    <!-- Subcategory List -->
    <h4 class="text-center mb-3">Subcategory List</h4>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Subcategory Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_subcategory s INNER JOIN tbl_category c ON s.category_id = c.category_id";
        $result = $Con->query($selQry);
        while($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['category_name']; ?></td>
                <td><?php echo $data['subcategory_name']; ?></td>
                <td>
                    <a href="Subcategory.php?did=<?php echo $data['subcategory_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
