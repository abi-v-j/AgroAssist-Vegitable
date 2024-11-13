<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

// SQL query to fetch booking details
$selQry = "SELECT * FROM tbl_booking b 
           INNER JOIN tbl_cart c ON c.booking_id = b.booking_id 
           INNER JOIN tbl_product p ON p.product_id = c.product_id 
           INNER JOIN tbl_supplier s ON b.supplier_id = s.supplier_id 
           WHERE p.farmer_id = '" . $_SESSION["fid"] . "' AND b.booking_status != '0' AND c.cart_status != '0'";

$res = $Con->query($selQry);

// Update booking status
if (isset($_GET["cid"])) {
    $upQry = "UPDATE tbl_booking SET booking_status = '" . $_GET["sts"] . "' WHERE booking_id = '" . $_GET["cid"] . "' ";
    if ($Con->query($upQry)) {
        echo "<script>window.location='ViewBooking.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Order Details</h1>

    <!-- Orders Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $quantity = $row["cart_qty"];
                $price = $row["product_price"];
                $totalamount = $quantity * $price;
                $i++;
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><img src="../Assets/Files/Photo/<?php echo $row["product_photo"]; ?>" class="img-thumbnail" width="100" height="100"></td>
                    <td><?php echo $row["cart_qty"]; ?></td>
                    <td><?php echo $row["product_price"]; ?></td>
                    <td><?php echo $totalamount; ?></td>
                    <td><?php echo $row["supplier_name"]; ?></td>
                    <td><?php echo $row["supplier_contact"]; ?></td>
                    <td>
                        <?php 
                        if ($row["booking_status"] == 1) {
                            echo '<span class="badge bg-warning">Payment Pending</span>';
                        } elseif ($row["booking_status"] == 2) {
                            echo '<span class="badge bg-success">Payment Completed</span> / 
                                  <a href="ViewBooking.php?cid=' . $row["booking_id"] . '&sts=3" class="btn btn-sm btn-primary">Pack Product</a>';
                        } elseif ($row["booking_status"] == 3) {
                            echo '<span class="badge bg-info">Product Packed</span> / 
                                  <a href="ViewBooking.php?cid=' . $row["booking_id"] . '&sts=4" class="btn btn-sm btn-primary">Ship Product</a>';
                        } elseif ($row["booking_status"] == 4) {
                            echo '<span class="badge bg-primary">Product Shipped</span> / 
                                  <a href="ViewBooking.php?cid=' . $row["booking_id"] . '&sts=5" class="btn btn-sm btn-primary">Deliver Product</a>';
                        } elseif ($row["booking_status"] == 5) {
                            echo '<span class="badge bg-success">Order Completed</span>';
                        }
                        ?>
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
