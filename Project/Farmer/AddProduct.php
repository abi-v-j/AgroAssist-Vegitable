<?php
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if (isset($_POST['btn_add'])) {
    $name = $_POST['txt_name'];
    $price = $_POST['txt_price'];
    $category = $_POST['selcategory'];
    
    // File upload handling
    $photo = $_FILES['file_photo']['name'];
    $tempPhoto = $_FILES['file_photo']['tmp_name'];
    move_uploaded_file($tempPhoto, "../Assets/Files/Product/" . $photo);
    
    $description = $_POST['txt_description'];
    
    // Inserting product details into the database
    $insQry = "INSERT INTO tbl_product (product_name, product_price, product_photo, product_description, category_id, farmer_id) 
               VALUES ('$name', '$price', '$photo', '$description', '$category', '" . $_SESSION['fid'] . "')";
    
    if ($Con->query($insQry)) {
        echo "<script>alert('Product Added'); window.location='AddProduct.php';</script>";
    } else {
        echo "<script>alert('Failed to Add Product');</script>";
    }
}

// Deleting product
if (isset($_GET['did'])) {
    $delQry = "DELETE FROM tbl_product WHERE product_id = " . $_GET['did'];
    if ($Con->query($delQry)) {
        echo "<script>alert('Product Deleted'); window.location='AddProduct.php';</script>";
    } else {
        echo "<script>alert('Failed to Delete Product');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Add Product</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="txt_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="txt_name" name="txt_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="selcategory" class="form-label">Category</label>
                            <select class="form-select" id="selcategory" name="selcategory" required>
                                <option value="">-Select-</option>
                                <?php
                                $sel = "SELECT * FROM tbl_category";
                                $res = $Con->query($sel);
                                while ($row = $res->fetch_assoc()) {
                                    echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txt_price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="txt_price" name="txt_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="file_photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="file_photo" name="file_photo" required>
                        </div>
                        <div class="mb-3">
                            <label for="txt_description" class="form-label">Description</label>
                            <textarea class="form-control" id="txt_description" name="txt_description" rows="4" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" name="btn_add">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Product List -->
    <h2 class="text-center mt-5">Product List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $selQry = "SELECT * FROM tbl_product WHERE farmer_id = '" . $_SESSION['fid'] . "'";
            $result = $Con->query($selQry);
            while ($data = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['product_name']; ?></td>
                    <td><?php echo $data['product_price']; ?></td>
                    <td><img src="../Assets/Files/Product/<?php echo $data['product_photo']; ?>" class="img-thumbnail" width="70" height="70"></td>
                    <td><?php echo $data['product_description']; ?></td>
                    <td>
                        <a href="AddStock.php?acid=<?php echo $data['product_id']; ?>" class="btn btn-success btn-sm">Add Stock</a>
                        <a href="AddProduct.php?did=<?php echo $data['product_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="../Assets/JQ/jQuery.js"></script>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
