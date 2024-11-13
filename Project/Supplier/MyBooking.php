<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");

		$selQry = "select * from tbl_booking b 
                  inner join tbl_cart c on c.booking_id = b.booking_id 
                  inner join tbl_product p on p.product_id = c.product_id 
                  inner join tbl_farmer k on k.farmer_id = p.farmer_id 
                  where supplier_id = '".$_SESSION["sid"]."' 
                  and booking_status > 0 and cart_status > 0"; 
		$res = $Con->query($selQry);
    
	?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Page</title>
    <!-- Bootstrap CSS -->
     <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Order and Payment Status</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>SlNo</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Farmer Name</th>
                        <th>Status</th>
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
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><img src="../Assets/Files/Product/<?php echo $row["product_photo"]; ?>" class="img-fluid" width="70" /></td>
                        <td><?php echo $row["cart_qty"]; ?></td>
                        <td><?php echo "$totalamount"; ?></td>
                        <td><?php echo $row["farmer_name"]; ?></td>
                        <td>
                            <?php 
                            if ($row["booking_status"] == 1) {
                                echo "Payment Pending";
                            } elseif ($row["booking_status"] == 2) {
                                echo "Payment Completed";
                            } elseif ($row["booking_status"] == 3) {
                                echo "Product Packed";
                            } elseif ($row["booking_status"] == 4) {
                                echo "Product Shipped";
                            } elseif ($row["booking_status"] == 5) {
                                echo "Order Completed";
                            }
                            ?>
                            <br>
                            <a href="Complaint.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-sm btn-danger mt-2">Complaint</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>

<?php
include("Foot.php");
ob_flush();
?>
