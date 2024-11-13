<?php 
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_GET['acid']))
{
	$upQry = "update tbl_farmer set farmer_status='1' where farmer_id = ".$_GET['acid'];
	if($Con -> query($upQry))
	{
?>
        <script>
		alert("Accepted");
		window.location ="Viewfarmer.php";
		</script>
<?php
	}
}

if(isset($_GET['rejid']))
{
	$upQry = "update tbl_farmer set farmer_status='2' where farmer_id = ".$_GET['rejid'];
	if($Con -> query($upQry))
	{
?>
        <script>
		alert("Rejected");
		window.location ="Viewfarmer.php";
		</script>
<?php
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Farmer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4">Farmer List</h3>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
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
        $i = 0;
        $selQry = "SELECT * FROM tbl_farmer f 
                   INNER JOIN tbl_place p ON f.place_id=p.place_id 
                   INNER JOIN tbl_district d ON p.district_id=d.district_id 
                   WHERE f.farmer_status='0'";
        $result = $Con->query($selQry);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['farmer_name']; ?></td>
                <td><?php echo $data['district_name']; ?></td>
                <td><img src="../Assets/Files/UserDocs/<?php echo $data['farmer_photo']; ?>" class="img-thumbnail" width="70" height="70" /></td>
                <td><?php echo $data['place_name']; ?></td>
                <td><?php echo $data['farmer_contact']; ?></td>
                <td><?php echo $data['farmer_address']; ?></td>
                <td>
                    <a href="Viewfarmer.php?acid=<?php echo $data['farmer_id']; ?>" class="btn btn-success btn-sm">Accept</a>
                    <a href="Viewfarmer.php?rejid=<?php echo $data['farmer_id']; ?>" class="btn btn-danger btn-sm">Reject</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <h3 class="my-4">Accepted Farmers</h3>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
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
        $i = 0;
        $selQry = "SELECT * FROM tbl_farmer f 
                   INNER JOIN tbl_place p ON f.place_id=p.place_id 
                   INNER JOIN tbl_district d ON p.district_id=d.district_id 
                   WHERE f.farmer_status='1'";
        $result = $Con->query($selQry);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['farmer_name']; ?></td>
                <td><?php echo $data['district_name']; ?></td>
                <td><img src="../Assets/Files/UserDocs/<?php echo $data['farmer_photo']; ?>" class="img-thumbnail" width="70" height="70" /></td>
                <td><?php echo $data['place_name']; ?></td>
                <td><?php echo $data['farmer_contact']; ?></td>
                <td><?php echo $data['farmer_address']; ?></td>
                <td>
                    <a href="Viewfarmer.php?rejid=<?php echo $data['farmer_id']; ?>" class="btn btn-danger btn-sm">Reject</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <h3 class="my-4">Rejected Farmers</h3>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
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
        $i = 0;
        $selQry = "SELECT * FROM tbl_farmer f 
                   INNER JOIN tbl_place p ON f.place_id=p.place_id 
                   INNER JOIN tbl_district d ON p.district_id=d.district_id 
                   WHERE f.farmer_status='2'";
        $result = $Con->query($selQry);
        while ($data = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['farmer_name']; ?></td>
                <td><?php echo $data['district_name']; ?></td>
                <td><img src="../Assets/Files/UserDocs/<?php echo $data['farmer_photo']; ?>" class="img-thumbnail" width="70" height="70" /></td>
                <td><?php echo $data['place_name']; ?></td>
                <td><?php echo $data['farmer_contact']; ?></td>
                <td><?php echo $data['farmer_address']; ?></td>
                <td>
                    <a href="Viewfarmer.php?acid=<?php echo $data['farmer_id']; ?>" class="btn btn-success btn-sm">Accept</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
        </br>
        </br>
<!-- Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>

