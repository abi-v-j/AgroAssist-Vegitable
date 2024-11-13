<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if (isset($_POST['btn_add'])) {
    $stock = $_POST['txt_stock'];
    
    // Inserting stock details into the database
    $insQry = "INSERT INTO tbl_stock (stock_count, product_id) VALUES ('$stock', '" . $_GET['acid'] . "')";
    
    if ($Con->query($insQry)) {
        echo "<script>alert('Stock Added');</script>";
    } else {
        echo "<script>alert('Failed to Add Stock');</script>";
    }
}

// Deleting stock
if (isset($_GET['did'])) {
    $delQry = "DELETE FROM tbl_stock WHERE stock_id = " . $_GET['did'];
    if ($Con->query($delQry)) {
        echo "<script>alert('Stock Deleted'); window.location='AddStock.php?acid=" . $_GET['acid'] . "';</script>";
    } else {
        echo "<script>alert('Failed to Delete Stock');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Add Stock</h1>

    <!-- Stock Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="txt_stock" class="form-label">Stock Quantity</label>
                            <input type="text" class="form-control" id="txt_stock" name="txt_stock" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" name="btn_add">Add Stock</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock List -->
    <h2 class="text-center mt-5">Added Stocks</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Stock Count</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $selQry = "SELECT * FROM tbl_stock WHERE product_id=" . $_GET['acid'];
            $result = $Con->query($selQry);
            while ($data = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['stock_count']; ?></td>
                    <td>
                        <a href="AddStock.php?did=<?php echo $data['stock_id']; ?>&acid=<?php echo $_GET['acid']; ?>"
                           class="btn btn-danger btn-sm">Delete</a>
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
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
