<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <!-- Include Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4">View Product List</h3>

        <div class="alert alert-success success" role="alert" style="display: none;">
            Product added to cart successfully!
        </div>
        <div class="alert alert-warning warning" role="alert" style="display: none;">
            Product is already in the cart!
        </div>
        <div class="alert alert-danger failure" role="alert" style="display: none;">
            Failed to add product to cart!
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">SI No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_product";
                $result = $Con->query($selQry);
                while ($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['product_name']; ?></td>
                        <td><?php echo $data['product_price']; ?></td>
                        <td><img src="../Assets/Files/UserDocs/<?php echo $data['product_photo']; ?>" class="img-thumbnail" width="70" height="70" /></td>
                        <td><?php echo $data['product_description']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" onclick="addCart(<?php echo $data['product_id']; ?>)">Add to Cart</button>
                            <a href="AddProduct.php?did=<?php echo $data['product_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function(result) {
                    $("#sel_place").html(result);
                }
            });
        }

        function addCart(id) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                success: function(response) {
                    if (response.trim() === "Added to Cart") {
                        $(".success").fadeIn(300).delay(1500).fadeOut(400);
                    } else if (response.trim() === "Already Added to Cart") {
                        $(".warning").fadeIn(300).delay(1500).fadeOut(400);
                    } else {
                        $(".failure").fadeIn(300).delay(1500).fadeOut(400);
                    }
                }
            });
        }
    </script>

    <?php include("Foot.php"); ob_flush(); ?>
</body>

</html>
