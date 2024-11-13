<?php 
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_GET['acid'])) {
    $upQry = "update tbl_supplier set supplier_status='1' where supplier_id = ".$_GET['acid'];
    if($Con -> query($upQry)) {
        echo "<script>alert('Accepted'); window.location ='ViewSupplier.php';</script>";
    }
}

if(isset($_GET['rejid'])) {
    $upQry = "update tbl_supplier set supplier_status='2' where supplier_id = ".$_GET['rejid'];
    if($Con -> query($upQry)) {
        echo "<script>alert('Rejected'); window.location ='ViewSupplier.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Supplier</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h3 class="text-center">Supplier List</h3>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>SI No</th>
                <th>Name</th>
                <th>District</th>
                <th>Photo</th>
                <th>Place</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i=0;
            $selQry = "select * from tbl_supplier s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where s.supplier_status='0'";
            $result = $Con->query($selQry);
            while($data = $result->fetch_assoc()) {
                $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['supplier_name'] ?></td>
                <td><?php echo $data['district_name'] ?></td>
                <td><img src="../Assets/Files/UserDocs/<?php echo $data['supplier_photo'] ?>" class="img-fluid rounded" style="width: 70px; height: 70px;" /></td>
                <td><?php echo $data['place_name'] ?></td>
                <td><?php echo $data['supplier_contact'] ?></td>
                <td><?php echo $data['supplier_address'] ?></td>
                <td>
                    <a href="ViewSupplier.php?acid=<?php echo $data['supplier_id']?>" class="btn btn-success btn-sm">Accept</a>
                    <a href="ViewSupplier.php?rejid=<?php echo $data['supplier_id']?>" class="btn btn-danger btn-sm">Reject</a>
                </td>
            </tr>
        <?php
            }
        ?> 
        </tbody>
    </table>

    <h3 class="text-center">Accepted List</h3>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>SI No</th>
                <th>Name</th>
                <th>District</th>
                <th>Photo</th>
                <th>Place</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i=0;
            $selQry = "select * from tbl_supplier s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where s.supplier_status='1'";
            $result = $Con -> query($selQry);
            while($data = $result -> fetch_assoc()) {
                $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['supplier_name'] ?></td>
                <td><?php echo $data['district_name'] ?></td>
                <td><img src="../Assets/Files/UserDocs/<?php echo $data['supplier_photo'] ?>" class="img-fluid rounded" style="width: 70px; height: 70px;" /></td>
                <td><?php echo $data['place_name'] ?></td>
                <td><?php echo $data['supplier_contact'] ?></td>
                <td><?php echo $data['supplier_address'] ?></td>
                <td><a href="ViewSupplier.php?rejid=<?php echo $data['supplier_id']?>" class="btn btn-danger btn-sm">Reject</a></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    <h3 class="text-center">Rejected List</h3>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>SI No</th>
                <th>Name</th>
                <th>District</th>
                <th>Photo</th>
                <th>Place</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i=0;
            $selQry = "select * from tbl_supplier s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where s.supplier_status='2'";
            $result = $Con->query($selQry);
            while($data = $result->fetch_assoc()) {
                $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['supplier_name'] ?></td>
                <td><?php echo $data['district_name'] ?></td>
                <td><img src="../Assets/Files/UserDocs/<?php echo $data['supplier_photo'] ?>" class="img-fluid rounded" style="width: 70px; height: 70px;" /></td>
                <td><?php echo $data['place_name'] ?></td>
                <td><?php echo $data['supplier_contact'] ?></td>
                <td><?php echo $data['supplier_address'] ?></td>
                <td><a href="ViewSupplier.php?acid=<?php echo $data['supplier_id']?>" class="btn btn-success btn-sm">Accept</a></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
</br>
</br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
