<?php
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center mb-4">Supplier Complaints</h2>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Supplier Name</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_complaint c 
                   INNER JOIN tbl_product p ON c.product_id=p.product_id 
                   INNER JOIN tbl_supplier s ON c.supplier_id=s.supplier_id 
                   WHERE complaint_status=0";
        $result = $Con->query($selQry);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['supplier_name']; ?></td>
                <td><?php echo $data['complaint_title']; ?></td>
                <td><?php echo $data['complaint_content']; ?></td>
                <td><?php echo $data['complaint_date']; ?></td>
                <td><?php echo $data['product_name']; ?></td>
                <td><a href="Reply.php?id=<?php echo $data['complaint_id']; ?>" class="btn btn-primary btn-sm">Reply</a></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

    <h2 class="text-center my-4">Farmer Complaints</h2>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Farmer Name</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_complaint c 
                   INNER JOIN tbl_farmer f ON c.farmer_id=f.farmer_id 
                   WHERE complaint_status=0";
        $result = $Con->query($selQry);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['farmer_name']; ?></td>
                <td><?php echo $data['complaint_title']; ?></td>
                <td><?php echo $data['complaint_content']; ?></td>
                <td><?php echo $data['complaint_date']; ?></td>
                <td><a href="Reply.php?id=<?php echo $data['complaint_id']; ?>" class="btn btn-primary btn-sm">Reply</a></td>
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
